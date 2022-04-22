<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Saving;
use DB;


class SavingController extends Controller
{

    public function allSavings()
    {
        $saving = Saving::all();
        return response()->json($saving);
    }



    public function storeSaving(Request $request){

        $this->validate($request,[

            'amount'=>'required',
            'method_of_payment'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            
        ]);


        $saving = new Saving();

            // Available alpha caracters
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

         // generate a pin based on 2 * 7 digits + a random character
         $pin = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
             . $characters[rand(0, strlen($characters) - 1)];

         // shuffle the result
            $transactionid = str_shuffle($pin);

            $saving->user_id = auth()->user()->id;
            $saving->email= auth()->user()->email;
            $saving->amount = $request->amount;
            $saving->method_of_payment = $request->method_of_payment;
            $saving->reference = $transactionid;
            $saving->start_date = $request->start_date;
            $saving->end_date = $request->end_date;
            $saving->save();

            return response()->json('Data Successfull Saved!');
    }


    public function mySavings($id)
    {
        $saving = DB::table('savings')->where('id',$id)->first();

        return response()->json($saving);
    }


    
}
