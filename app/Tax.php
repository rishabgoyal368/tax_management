<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'image', 'status',
    ];

    public static function addEdit($data)
    {
        return tax::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'] ?: null,
                'parent_id' => @$data['parent_id'] ?: '0',
                'image' => @$data['image'] ?: null,
                'status' => @$data['status'] ?: null,
            ]
        );
    }

    public function getAlocateUser()
    {
        return User::where('id', $this->alocate_to)->first();
    }
}
