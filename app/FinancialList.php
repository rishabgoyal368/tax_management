<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialList extends Model
{
	protected $fillable = [
		'user_id',
        'yearly_budget'
    ];
}
