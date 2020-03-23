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
        'title', 'uploadBy', 'department_id', 'status'
    ];

    // Add or Update
    public static function addorUpdate($data)
    {
        Designation::withTrashed()->updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['title'],
                'department_id' => $data['department_id'] ?: null,
                'status' =>  $data['status'],
            ]
        );
    }

    // Delete
    public static function remove($id)
    {
        Designation::withTrashed()->where('id', $id)->update([
            'status' => 'Deleted'
        ]);
        return Designation::withTrashed()->where('id', $id)->delete();
    }

    // Check or Create
    public static function checkOrCreate($department)
    {
        $data =   Designation::firstOrCreate([
            'title' => $department
        ]);
        return $data['id'];
    }

    public function getDepartment()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
