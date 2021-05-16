<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryTax extends Model
{

    protected $fillable = [
        'user_id',
        'upload_photo_of_tax',
        'company_contract',
        'national_id',
        'financial_budget',
        'import_export_certificates',
        'other_docs',
        'commercial_certificate',
        'additional_tax',
        'office_lease_contract',
        'social_insurance',
        'construction_certificate',
        'industrial_certificate'
    ];
          
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    } 
}
