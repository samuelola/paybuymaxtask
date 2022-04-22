<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airtime extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'reference','operator'
    ];

    public function user(){

       return $this->belongsTo('App\User');
    }
}
