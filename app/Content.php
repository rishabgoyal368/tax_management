<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    protected $fillable = ['tax', 'content'];

    public function getTax()
    {
        $arr = array(
            '1' => 'Income tax',
            '2' => 'Additional tax',
            '3' => 'Social Insurance',
            '4' => 'Salaries tax',
            '5' => 'Official documents',
            '6' => 'Add  / Deduct tax',
            '7' => 'Companies Establishment',
            '8' => 'Financial List',
        );
        return  $arr[$this->tax];
    }
}
