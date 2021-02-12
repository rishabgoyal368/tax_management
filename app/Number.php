<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $table = 'number';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'audio', 'image', 'description'
    ];
    
    public static function addEdit($data)
    {
        $user = Number::where('id', $data['id'])->first();
        return Number::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'image' => @$data['file'] ?: @$user['image'],
                'description' => @$data['description'] ?: @$user['description'],
                'audio' => @$data['audio_file'] ?: @$user['audio'],
            ]
        );
    }
    public function getImageAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }

    public function getAudioAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }
}
