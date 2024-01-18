<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class TicketsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function cTickets(User $user)
    {
        return view('tickets.index', compact('user'));
    }

    public function bTickets(Request $data)  // Validates captured data (a) and pass the arrey (b) to variables to display on next page
    {
        $data = request()->validate([       // (a)
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'destination' => 'required',
            'amount' => 'required|numeric', 
            'curr' => 'required', 
            //'name'=> $user->name,
        ]);

        if ($data['curr'] == "usd") { $currSign = 'USD $'; } elseif ($data['curr'] == "eur") { $currSign = 'EUR €'; } else{ $currSign = 'GBP £'; };

        $xAmount = $data['amount'];
        function curformatAMT ($xAmount) {
            //  SPLIT WHOLE & DECIMALS
            $usdball= explode(".", $xAmount);
            $whole = $usdball[0];
            $decimal = isset($usdball[1]) ? $usdball[1] : "00" ;
          
            //  ADD THOUSAND SEPARATORS
            if (strlen($whole) > 3) {
              $temp = ""; $j = 0;
              for ($i=strlen($whole)-1; $i>=0; $i--) {
                $temp = $whole[$i] . $temp;
                $j++;
                if ($j%3==0 && $i!=0) { $temp = "," . $temp; }
              }
              $whole = $temp;
            }
          
            //  RESULT
            return "$whole.$decimal";
              }
          $nAmt = curformatAMT($xAmount);   // FORMATTED CURRENT BALANCE


        $data = ([          // (b)
            'destination' => $data['destination'],
            'amount' => $data['amount'],
            'curr' => $data['amount'],
            'curr' => $data['curr'],
            'currSign' => $currSign,
            'nAmt' => $nAmt

            //'from' => ['Tickets Systems'],
            //'replyTo' => ['Razor@rhi.com'],
            //'bcc' => ['ee2@aol.com']

        ]);

        return view('tickets.payments', $data);
        

        // Pass thru the authenticated user and store the data in 'profile'  NOte the table name is '
        //auth()->user()->profile()->create($data); We need to pass the STRIPE payment b4 storing
        
    }

   
    public function dTickets(Request $data)  // Remember U capturing a new post
    {

        $data = request()->validate([       // validate new data sent from payment.blade.php
            //'another-string' => '', # A field not requiring validation but has to be stored in DB
            'destination' => 'required',
            'amount' => 'required', 
            'curr' => 'required', 
            'currSign' => 'required', 
            'nAmt' => 'required', 
            //'name'=> $user->name,
        ]);
        
        return view('tickets.checkout', $data);
    }

   
}
