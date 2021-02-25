<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Auth\User  as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'profile_pic', 'password', 'phone_number', 'status', 'role', 'created_by','job'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function addEdit($data)
    {
        return Admin::updateOrcreate(
            [
                'id' => $data['id'],
            ],
            [
                'name' => @$data['name'],
                'email' => @$data['email'],
                'profile_pic' => @$data['profile_pic'],
                'phone_number' => @$data['phone_number'],
                'password' => $data['password'],
                'created_by' => @$data['created_by'],
                'status' => @$data['status'],
                'role' => @$data['role'],
                'job' => $data['job']
            ]
        );
    }

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
