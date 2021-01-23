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
                'content' => @$data['content'] ?: @$user['content'],
            ]
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'content'
    ];
}
