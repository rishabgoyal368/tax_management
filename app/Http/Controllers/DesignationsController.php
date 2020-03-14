<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Designation;
use App\Department;



class DesignationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show()
    {
        $department = Designation::paginate(env('PAGINATE'));
        return view('Department.list', compact('department'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $department = Designation::find($id);
                return view('Department.details', compact('department'));
            } else {
                #Insert
                return view('Department.details');
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validate($request, [
                'title'  => 'required',
                'department' => 'required',
            ]);
            $request['department_id'] = Department::checkOrCreate($request->department);
            Designation::addorUpdate($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('/designation')->with(['success' => 'Job Listing Websites ' . $response . ' successfully']);
        }
    }
}
