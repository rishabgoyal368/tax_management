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
        'title', 'designation_id', 'department_id', 'min_experience', 'max_experience',
        'min_salary', 'max_salary', 'position', 'description', 'time_period','status'
    ];


    public static function addorUpdate($data)
    {

        JobOpening::withTrashed()->updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
                'title' => $data['JobTitle'],
                'designation_id' => $data['designation_id'],
                'department_id' => $data['department_id'],
                'min_experience' => $data['minExperience'],
                'max_experience' => $data['maxExperience'],
                'min_salary' => $data['minSalary'],
                'max_salary' => $data['maxSalary'],
                'position' => $data['postion'],
                'description' => $data['description'],
                'time_period' => $data['date'],
                'status' => 'Open'
            ]
        );
        JobOpening::where('id', $data['id'])->restore();
    }

    public function getDesignation()
    {
        return $this->hasOne('App\Designation', 'id', 'designation_id');
    }

    public function getDepartment()
    {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }
}
