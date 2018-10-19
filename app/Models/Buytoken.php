<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buytoken extends Model
{
    public function userInfo()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id')->select('id', 'username');
    }
}
