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
use Helper;


class JobOpeningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $Jobopening = [];
        return view('JobOpening.list', compact('Jobopening'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $label = 'Add job Opening';
            return view('JobOpening.details', compact('label'));
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request;
            $this->validate($request, [
                'JobTitle' =>  'required|alpha_num|max:255',
                'department' =>  'required|max:255',
                'designation' =>  'required|max:255',
                'minExperience' =>  'nullable|numeric|min:0',
                'maxExperience' =>  'required|numeric|required_with:minExperience|min:1',
                'minSalary' =>  'nullable|numeric|min:0',
                'maxSalary' =>  'required|numeric|required_with:minSalary|min:1',
                'postion' =>  'required|numeric|maxlength:3|min:1',
                'description' =>  'required|alpha_num|max:255',
                'timePeriod' =>  'required|max:255',
            ]);
            return $request;
            $request['department_id'] = Designation::checkOrCreate(@$request->designation);
            $request['department_id'] = Department::checkOrCreate(@$request->department);

            return $request;
            JobOpening::addorUpdate($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('Job-listing-websites')->with(['success' => 'Job Listing Websites ' . $response . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
    }

    public function view($id)
    {
    }
}
