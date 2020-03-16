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

    public static function addorUpdate($data)
    {
        if($data['status'] == '3')
        {
            $data =  Designation::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'title' => $data['title'],
                    'department_id' => $data['department_id'] ?: null,
                    'status' => (int) $data['status'],
                ]
            );
            Designation::where('id', $data['id'])->delete();
        }
        else{
            Designation::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'title' => $data['title'],
                    'department_id' => $data['department_id'] ?: null,
                    'status' => (int) $data['status'],
                ]
            );
            Designation::where('id', $data['id'])->restore();
        }
       
    }

    

    public static function remove($id)
    {
        Designation::withTrashed()->where('id', $id)->update([
            'status' => 3
        ]);
        return Designation::withTrashed()->where('id', $id)->delete();
    }

    public function getDepartment()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
