<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $fillable = [
        'user_id', 'email', 'amount','reference','method_of_payment','start_date','end_date'
    ];

    public function user(){

       return $this->belongsTo('App\User');
    }
}
