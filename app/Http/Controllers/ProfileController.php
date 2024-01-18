<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;   // ADD THIS LINE TO ENABLE THE AUTHENTICATED USER TO BE CALLED
use App\Models\Post;   // ADD THIS LINE TO ENABLE THE AUTHENTICATED USER TO BE CALLED

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

   // ALL PAGES IN DIR /profile/

   // EG for password
   /*public function cPass()
   {
       return view('profile.password');
   }
   */

   public function cPass($user)// Password  
    {
        $user = User::findORFail($user);

        return view('profile.password', [  // PASS THE USER DETAILS RETRIEVED 
            'user' => $user,

        ]);
    }

    public function cProfilE(User $user)  // (a) OR public function index(User $user)   // Profile
    {
        if (Auth()->user()->profile()->count() === 0) {  // If no profiles db exist return to home page
                return redirect('/h');
             }
        $user = User::findORFail($user); // If using (a) remove this line

        return view('profile.index', [  /// This becomes  return view('profiles.index', compact('user'));   // PASS THE USER DETAILS RETRIEVED 
            'user' => $user,

        ]);
    }

    public function cEdit(User $user) // Edit Profile
    {

        return view('profile.update', compact('user'));
    }

    public function cMail($user) // Mail
    {
        $user = User::findORFail($user);

        return view('profile.mail', [  // PASS THE USER DETAILS RETRIEVED 
            'user' => $user,

        ]);
    }

    public function cShow() // Shows the uploaded images from post
    {

        return view('profile.show');
    }

    public function cUpdate() // Shows the Update page
    {

        return view('profile.update');
    }

    /**
     * -------------------------------------------------------------------------------------------------------------------------------------
     * // PROFILE UPDATE
     * -------------------------------------------------------------------------------------------------------------------------------------
     */
    public function update(User $user)  // Stores the data passed from the <form method="POST" action="/i" enctype="multipart/form-data" method="post">  also linked to ROUTE
    {

        $data = request()->validate([
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            // 'url' => 'url',  // This is the validation for URL
            'image' => ['', 'image'], // allows a profile update if no image is added.  ['', 'image'], // 'image' => '|image', or as an arrey:  'image' => ['', 'image'], # |image => ensures it must be an image  look up validation rules in laravel
            
        ]);

        if (request('image')) {
            
            $imagePath = request('image')->store('upload', 'public'); # store file in local storage 'public'  Amason has a storage for image s3
        
            // IF NO IMAGE IS SET DO NOT OVERIDE
            $imageArray = ['image' => $imagePath];    
        }


        
        // Pass thru the authenticated user and store the data in 'profile'  NOte the table name is '
        auth()->user()->profile()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        
       //  auth()->user(in Models/Profile)->profile(in Models/User)->create();
       //  dd(request()->all());

       // **  NOTE  in web.php i linked to the Route::get('/i/', [App\Http\Controllers\ProfileController::class, 'store']);
       return redirect('/b/index');  // '/profile.index' // here the profile is READ
    }

    public function cPost2D(Post $posts) // Shows the Update page   // Route Model Binding  =use this model = App\Models\User
    {

        return view('profile.show_singleI', compact('posts')); //compact('posts')  'posts' model name in User.php
        /**  OR
         * return view('profile.show_singleI', [  // PASS THE POST ID RETRIEVED 
         *      'post' => $post,
         * 
         *      ]);
         */
    }
    
    public function cDelete(Post $posts) // Delete an Image retrieved by ID
    {
        $posts = Post::where('id', $posts->id)->firstorfail()->delete(); // Destroys the post based on theID
        return redirect('/home'); 
        // https://www.geeksforgeeks.org/laravel-delete-records/
        /**
         * Know the difference between
         * 1. return redirect('/home');  This uses a link existing in the route
         * 2. return view('profile.show_singleI') uses a page existing in a directory
         */
    }

    
}
