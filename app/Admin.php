<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User  as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'first_name','last_name','email','image','password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

public static function Updates($data)
    {
        Admin::updateOrCreate(
            ['id' => $data['id']],

                ['first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'image' => $data['image'],
            ]);
        Admin::where('id', $data['id'])->restore();
    }
}

   
