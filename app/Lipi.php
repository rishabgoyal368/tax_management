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
        'name', 'image', 'description','order','lipi'
    ];
    
    public static function addEdit($data)
    {
        $user = Lipi::where('id', $data['id'])->first();
        return Lipi::updateOrCreate(
            ['id' => @$data['id'] ?: null],
            [
                'name' => @$data['name'],
                'image' => @$data['file'],
                'description' => @$data['description'],
                'lipi' => 'test',
            ]
        );
    }

    public function getImageAttribute($value)
    {
        return env('APP_URL') .'uploads/'.$value;
    }

}
