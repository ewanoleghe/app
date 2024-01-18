<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    
protected $guarded =[];  # since I am validating all the data in post controller I can turn this off. when On it prevents anyting foreign from being added to db

    // FUNCTION TO CONNECT THE 'Post.php' Model TO THE Models/User.PHP  this cotrols displays in views/post/create.php
    public function user()   // connects the table 'profiles' to signed-in user 
    {
        return $this->belongsTo(User::class);
    }

}
