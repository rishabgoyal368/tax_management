<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User  as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'profile_pic', 'password', 'phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    // ----------------update admin profile data------------------
    public static function Updates($data)
    {
        Admin::where('id', $data['id'])->update([
            'name' => @$data['name'],
            'email' => @$data['email'],
            'profile_pic' => @$data['profile_pic'],
            'phone_number' => @$data['phone_number'],
        ]);
    }
    //----------------------update Admin password --------------------
    public static function Updatepassword($data)
    {
        Admin::where('id', $data['id'])->update([
            'password' => Hash::make($data['current_password']),
        ]);
    }
}
