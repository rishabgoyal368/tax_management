<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    
    public static function addEdit($data)
    {
        $user = Content::where('id', $data['id'])->first();
        return Content::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'] ?: @$user['name'],
                'image' => @$data['file'] ?: @$user['image'],
                'description' => @$data['content'] ?: @$user['content'],
                'content' => @$data['content'] ?: @$user['content'],
                'audio' => @$data['audio_file'] ?: @$user['audio'],
                'order' => @$data['order'] ?: @$user['order'],
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'content','audio','order','description'
    ];
}
