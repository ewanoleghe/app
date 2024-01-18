<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;   // ADD THIS LINE TO ENABLE THE AUTHENTICATED USER TO BE CALLED
use App\Mail\NewUserWelcomeMail; 
use App\Mail\ContactUsMail; 
use Illuminate\Support\Facades\Mail; 

class MailController extends Controller
{
    //
    public function cMail()
    {
        return view('profile.mail');

    }

    public function sendEmail()
    {
        $data = request()->validate([
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'subject' => 'required',
            'message' => 'required', 
            //'name'=> $user->name,
        ]);

        $data = ([
            'subject' => $data['subject'],
            'zmessage' => $data['message'],

            'from' => ['Razor Inc'],
            'replyTo' => ['Razor@rhi.com'],
            'bcc' => ['ee2@aol.com']

        ]);
        
        Mail::to('ewan.mails@gmail.com')->send(new ContactUsMail($data));
         return redirect('/b/index');
        //dd($data);

    }

}
