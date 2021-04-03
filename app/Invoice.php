<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'company_name', 'company_national_id', 'company_address', 'tax_registration_number', 'type_of_business'
    ];

    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
