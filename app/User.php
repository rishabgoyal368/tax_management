<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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
                'job' => @$data['job'] ?: @$user['job'],
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verify', 'profile_pic', 'phone_number', 'status','job','device_token'
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

    public function getProfilePicAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }
}
