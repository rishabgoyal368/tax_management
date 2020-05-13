<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\JobOpening;
use App\Designation;
use App\Department;
use Carbon\carbon;

use Helper;


class JobOpeningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $Jobopening = JobOpening::paginate(env('PAGINATE'));
        return view('JobOpening.list', compact('Jobopening'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $jobOpening = JobOpening::find($id);
                $label = 'Edit job Opening';
                return view('JobOpening.details', compact('jobOpening', 'label'));
            } else {
                $label = 'Add job Opening';
                return view('JobOpening.details', compact('label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request;
            $this->validate(
                $request,
                [
                    'JobTitle' =>  'required|string|max:255',
                    'department' =>  'required|max:255',
                    'designation' =>  'required|max:255',
                    'minExperience' =>  'nullable|numeric|min:0',
                    'maxExperience' =>  'required|numeric|required_with:minExperience|min:' . $request->minExperience,
                    'minSalary' =>  'nullable|numeric|min:0',
                    'maxSalary' =>  'required|numeric|required_with:minSalary|min:' . $request->minSalary,
                    'postion' =>  'required|numeric|digits_between:1,3|min:1',
                    'description' =>  'required|string|max:255',
                    'timePeriod' =>  'required|max:255',
                ],
                [
                    'maxExperience.min' => 'Maximum Experience is greater than minimum Experience',
                    'maxSalary.min' => 'Maximum Salary is greater than minimum Salary',
                ]
            );
            // return $request;
            $request['department_id'] = Department::checkOrCreate(@$request->department);
            $design['title'] = $request->designation;
            $design['department_id'] = $request['department_id'];
            $request['designation_id'] = Designation::checkOrCreate($design);

            $date =  Carbon::createFromFormat('d/m/Y', $request->timePeriod);
            $request['date'] = strtotime($date);
            // return $request;

            JobOpening::addorUpdate($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('job-opening')->with(['success' => 'Job Opening ' . $response . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
    }

    public function view($id)
    {
    }

    public function jobTitle(Request $request)
    {
        return JobOpening::where('JobTitle', 'LIKE', "%{$request->name}%")->get();
    }
}
