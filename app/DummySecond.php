<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DummySecond extends Model
{
    protected $table = 'dummy_seconds';

    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
