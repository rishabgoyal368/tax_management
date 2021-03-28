<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    
    protected $table = 'tasks';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'task_name','status','alocate_to','task_id'
    ];

    public static function addEdit($data)
    {
        return task::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'task_name' => @$data['name'] ?: null,
                'alocate_to' => @$data['user'] ?: null,
                'status' => @$data['status'] ?: null,
                'task_id' => @$data['task_id'] ?: null,
            ]
        );
    }

    public function getAlocateUser()
    {
        return User::where('id',$this->alocate_to)->first();
    }
}
