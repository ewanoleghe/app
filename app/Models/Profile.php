<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded =[];  # since I am validating all the data in post controller I can turn this off. when On it prevents anyting foreign from being added to db

    public function user()   // connects the table 'profiles' to signed-in user 
    {

        return $this->belongsTo(User::class);
    }

    public function profileImage()   // Returns uploaded profile image or a default 
    {
        $imagePath = ($this->image) ? $this->image : 'upload/profile/no-picture-available-icon.png';

        return '/storage/' . $imagePath;
        // return the profile image uploaded or return the default image stored in upload/profile/no-picture-available-icon.png
    }
}
