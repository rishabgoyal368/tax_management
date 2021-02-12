<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lipi extends Model
{
    protected $table = 'lipi';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'description','order'
    ];
    
    public static function addEdit($data)
    {
        $user = Lipi::where('id', $data['id'])->first();
        return Lipi::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'] ?: @$user['name'],
                'image' => @$data['file'] ?: @$user['image'],
                'description' => @$data['description'] ?: @$user['description'],
                'order' => @$data['order'] ?: @$user['order'],
            ]
        );
    }
}
