<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $GetDepartment = Designation::withTrashed()->latest()->paginate(env('PAGINATE'));
        return view('Designation.list', compact('GetDepartment'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $department = Designation::find($id);
                return view('Designation.details', compact('department'));
            } else {
                #Insert
                return view('Designation.details');
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

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:designations,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Designation::remove($request->id);
            return response()->json(['success' => 'Designation deleted successfully.']);
        }
    }
}
