<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\Mail;
//use App\Mail;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'state',
        'zip',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ALLOWS PRE-FILLING OF PROFILE TABLE AT REGISTRATION
    protected static function boot()
    {
        parent::boot();
        static::created(function ($user){  // Becomes an invent that gets fired anytime a new user is created  // READ: Events
            $user->profile()->create([
                'title' => $user->username,
            ]);

            // TO SEND NEW REGISTRATION EMAIL => IMPORT THE CLASS 'Mail'
            //Mail::to($user->email)->send(new NewUserWelcomeMail());

        
        });
    }


    // FUNCTION TO CONNECT THE USER TO THE Models/Profile.PHP
    public function profile()  // Connects the signed-in user to the table 'profiles'
    {

        return $this->hasOne(Profile::class);
    }

    // FUNCTION TO CONNECT THE USER TO THE Models/Post.PHP  this cotrols displays in views/post/create.php
    public function posts()  //  // Connects the signed-in user to the table 'post'  posts() because user can have many--plura
 	   {

  	      return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
  	  }

      public function tickets()
      {
        return $this->hasMany(Tickets::class)->orderBy('created_at', 'DESC');
      }
      
}
