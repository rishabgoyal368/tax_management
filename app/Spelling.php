<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spelling extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'khani','order','audio'
    ];
    
    public static function addEdit($data)
    {
        $user = Khani::where('id', $data['id'])->first();
        return Khani::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'] ?: @$user['name'],
                'image' => @$data['file'] ?: @$user['image'],
                'khani' => @$data['khani'] ?: @$user['khani'],
                'audio' => @$data['audio_file'] ?: @$user['audio'],
            ]
        );
    }
}
