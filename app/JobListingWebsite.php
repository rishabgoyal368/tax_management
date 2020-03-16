<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobListingWebsite extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'website', 'email', 'password', 'status'
    ];

    // public static function add($data)
    // {
    //     JobListingWebsite::updateOrCreate(
    //         ['id' => $data['id']],

    //             ['name' => $data['name'],
    //             'website' => $data['websiteLink'],
    //             'email' => $data['email'],
    //             'password' => $data['password'],
    //             'status' => $data['status'],
    //         ]);
    // }

public static function addorUpdate($data)
    {
        if($data['status'] == '3')
        {
            $data =  JobListingWebsite::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'name' => $data['name'],
                    'website' => $data['website'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'status' => $data['status'],
                ]
            );
                JobListingWebsite::where('id', $data['id'])->delete();
        }
        else{
            JobListingWebsite::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'name' => $data['name'],
                    'website' => $data['websiteLink'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'status' => $data['status'],
                ]
            );
            JobListingWebsite::where('id', $data['id'])->restore();
        }
        
    }
    public static function remove($id)
    {
       JobListingWebsite::where('id',$id)->delete(); 
    }
}
