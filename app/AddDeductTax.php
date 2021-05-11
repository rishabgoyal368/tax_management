<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddDeductTax extends Model
{
	    protected $fillable = [
 		    'user_id',
            'buy_invoice',
            'deduct_notice_paper',
            'other_docs',
            'payment_agreement',
            'form_no_41'

    ];
}
