<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyEstablishment extends Model
{
	    protected $fillable = [
 		'user_id',
            'stock_partnership',
            'partnerships_co',
            'one_person_co',
            'manufacturers',
            'adjust',
            'joint_stock_companies',
            'limited_liability',
            'sole_company',
            'branches',
            'separation_of_exit'

    ];

 }