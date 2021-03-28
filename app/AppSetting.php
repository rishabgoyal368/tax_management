<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $table = 'app_setting';
    
    public function getLogoAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'logo', 'app_version'
    ];
}
