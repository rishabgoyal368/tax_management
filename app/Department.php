<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Department extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'uploadBy', 'status'
    ];

    public static function add($data)
    {
        Department::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'name' => $data['name'],
                'uploadBy' => $data['uploadBy'],
                'status' => $data['status'],
            ]
        );
    }
}
