<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Skill;

class JobOpening extends Model
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'JobTitle', 'DesignationId', 'DepartmentId', 'MinExperienceRequired', 'MaxExperienceRequired', 'MinSalary', 'MaxSalary', 'Position', 'Description', 'Time period',
    ];

   
    public static function addorUpdate($data)
    {
        if($data['status'] == 'Deleted')
        {
            $data =  JobOpening::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'JobTitle' => $data['JobTitle'], 
                    'DesignationId' => $data['DesignationId'], 
                    'DepartmentId' => $data['DepartmentId'], 
                    'MinExperienceRequired' => $data['MinExperienceRequired'], 
                    'MaxExperienceRequired' => $data['MaxExperienceRequired'], 
                    'MinSalary' => $data['MinSalary'], 
                    'MaxSalary' => $data['MaxSalary'], 
                    'Position' => $data['Position'], 
                    'Description' => $data['Description'], 
                    'TimePeriod' => $data['TimePeriod'],

                ]
            );
            JobOpening::where('id', $data['id'])->delete();
        } else {
            JobOpening::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'JobTitle' => $data['JobTitle'], 
                    'DesignationId' => $data['DesignationId'], 
                    'DepartmentId' => $data['DepartmentId'], 
                    'MinExperienceRequired' => $data['MinExperienceRequired'], 
                    'MaxExperienceRequired' => $data['MaxExperienceRequired'], 
                    'MinSalary' => $data['MinSalary'], 
                    'MaxSalary' => $data['MaxSalary'], 
                    'Position' => $data['Position'], 
                    'Description' => $data['Description'], 
                    'TimePeriod' => $data['TimePeriod'],
                ]
            );
            JobOpening::where('id', $data['id'])->restore();
        }
    }
}
