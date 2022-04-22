<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Airtime;
use DB;
use App\Http\Resources\AirtimeResource;

class AirtimeController extends Controller
{

     public function __construct()
    {
       
        $this->middleware('JWT', ['except' => ['myAirtime']]);

        
    }

    public function myAirtime($amount,$operator)
    {
        
        return new AirtimeResource(Airtime::where('amount',$amount)->where('operator',$operator)->first());
    }


    public function saveAirtime(Request $request){

        $this->validate($request,[

            'amount'=>'required',
            'operator'=>'required',
            
        ]);


        $airtime = new Airtime();

            // Available alpha caracters
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

         // generate a pin based on 2 * 7 digits + a random character
         $pin = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];

         // shuffle the result
            $transactionid = str_shuffle($pin);

            $airtime->user_id = auth()->user()->id;
            $airtime->operator = $request->operator;
            $airtime->amount = $request->amount;
            $airtime->reference = $transactionid;
            $airtime->save();

            return response()->json('Data Successfull Saved!');
    }


    
}
