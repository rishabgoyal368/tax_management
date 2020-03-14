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
        'title', 'uploadBy'
    ];

    public static function addorUpdate($data)
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

    public static function checkOrCreate($department)
    {
        $data =   Department::firstOrCreate([
            'title' => $department
        ]);
        return $data['id'];
    }
}
