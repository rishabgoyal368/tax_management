<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public static function addEdit($data)
    {
        $user = User::where('id', $data['id'])->first();
        return User::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'] ?: @$user['name'],
                'email' => @$data['email'] ?: @$user['email'],
                'password' => @$data['password'] ?: @$user['password'],
                'email_verify' => @$data['email_verify'] ?: @$user['email_verify'],
                'profile_pic' => @$data['profile_pic'] ?: @$user['profile_pic'],
                'phone_number' => @$data['phone_number'] ?: @$user['phone_number'],
                'status' => @$data['status'] ?: @$user['status'],
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verify', 'profile_pic', 'phone_number', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
