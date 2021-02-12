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
        'audio', 'image', 'description'
    ];
    
    public static function addEdit($data)
    {
        $user = Spelling::where('id', $data['id'])->first();
        return Spelling::updateOrCreate(
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
