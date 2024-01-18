<?php

namespace App\Http\Controllers;
use Session;
use Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function stripePost(Request $data)
    {

        $data = request()->validate([       // (a)
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'destination' => 'required',
            'amount' => 'required', 
            'curr' => 'required', 
            //'name'=> $user->name,
        ]);

        $amount = $data['amount'];
        $currency = $data['curr'];
        $description = $data['destination'];
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => ($amount*100),
                "currency" => $currency,
                "source" => $data->stripeToken,
                "description" => $description,
        ]);
   
        Session::flash('success', 'Payment Successful !');
           
        return back();
    }
}
