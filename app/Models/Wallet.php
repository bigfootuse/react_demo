<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public  function user()
    {
        return  $this->hasOne('App\User', 'id','user_id')->select('first_name','last_name','email','username');
    }
    function user_info() {
        return  $this->hasOne('App\User', 'id','user_id')->select('first_name','last_name','email','username');
    }

    public  function user_h()
    {
        return  $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function userInfo()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->select('id', 'username');
    }
}
