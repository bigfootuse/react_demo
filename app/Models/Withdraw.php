<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public function user()
    {
        return $this->hasOne('App\User','id','user_id')->select('id','email','first_name','last_name','username');
    }
    function user_info() {
        return  $this->hasOne('App\User', 'id','user_id');
    }
}

















