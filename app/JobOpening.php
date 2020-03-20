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
        'Job_title', 'Designation_id', 'Department_id', 'Min_experience_required', 'Max_experience_required',
         'Min_salary', 'Max_salary', 'Position', 'Description', 'Time_period',
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
                    'Job_title' => $data['JobTitle'], 
                    'Designation_id' => $data['designation_id'], 
                    'Department_id' => $data['department_id'], 
                    'Min_experience_required' => $data['minExperience'], 
                    'Max_experience_required' => $data['maxExperience'], 
                    'Min_salary' => $data['minSalary'], 
                    'Max_salary' => $data['maxSalary'], 
                    'Position' => $data['postion'], 
                    'Description' => $data['description'], 
                    'Time_period' => $data['date'],
                ]
            );
            JobOpening::where('id', $data['id'])->delete();
        } else {
            JobOpening::withTrashed()->updateOrCreate(
                [
                    'id' => $data['id']
                ],
                [
                    'Job_title' => $data['JobTitle'], 
                    'DesignationId' => $data['designation_id'], 
                    'Department_id' => $data['department_id'], 
                    'Min_experience_required' => $data['minExperience'], 
                    'Max_experience_required' => $data['maxExperience'], 
                    'Min_salary' => $data['MinSalary'], 
                    'Max_salary' => $data['maxSalary'], 
                    'Position' => $data['postion'], 
                    'Description' => $data['description'], 
                    'Time_period' => $data['date'],
                ]
            );
            JobOpening::where('id', $data['id'])->restore();
        }
    }
}
