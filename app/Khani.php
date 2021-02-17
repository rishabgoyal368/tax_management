<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khani extends Model
{
    protected $table = 'khani';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'khani','audio'
    ];
    
    public function getImageAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }

    public function getAudioAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }

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
