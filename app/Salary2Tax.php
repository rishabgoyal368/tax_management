<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary2Tax extends Model
{
	protected $fillable = [
		'user_id',
        'upload_hiring_list',
        'upload_pay_slip',
        'upload_national_id',
        'upload_insured',
        'upload_salaries_list',
        'upload_deductions',
        'upload_benefits',
        'upload_resigning'

    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
