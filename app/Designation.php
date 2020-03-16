<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Designation extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'uploadBy', 'department_id'
    ];

    public static function addorUpdate($data)
    {
        Designation::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'department_id' => $data['department_id'] ?: null,
            ]
        );
    }

    public static function remove($id)
    {
        return Designation::where('id', $id)->delete();
    }

    public function getDepartment()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
