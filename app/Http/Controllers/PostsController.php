<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;   // ADD THIS LINE TO ENABLE THE AUTHENTICATED USER TO BE CALLED

// use Intervention\Image\Facades\Image;  // See line 38


class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');         // The user must be signed in
    }
    	
public function pCreate()  // This is linked to the Route
    {

        return view('post/create');
    }

    public function store()  // Stores the data passed from the <form method="POST" action="/f" enctype="multipart/form-data" method="post">  also linked to ROUTE
    {

        $data = request()->validate([
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'caption' => 'required',
            'image' => ['required', 'image'], // 'image' => 'required|image', or as an arrey:  'image' => ['required', 'image'], # |image => ensures it must be an image  look up validation rules in laravel
            
        ]);

        $imagePath = request('image')->store('upload', 'public'); # store file in local storage 'public'  Amason has a storage for image s3

        /*// use intervention image to resize images
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        */

        // Pass the authenticated user and store the data
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);
        
       //  auth()->user()->posts()->create();
       //  dd(request()->all());

       // **  NOTE  in web.php i linked to the Route::get('/g/', [App\Http\Controllers\ProfileController::class, 'cShow']);//->name('profile.show');
       return redirect('/g/');  // '/profile.show' // here Images are shown with @foreach($user->posts as $post)

        // return view('profile/show');   // Because I am showing the images with @foreach(auth()->user()->posts as $post)
        // return view() allows an image to be uploaded following each refresh
    }

    
}
