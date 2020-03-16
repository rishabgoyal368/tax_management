<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

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
                $department = Designation::withTrashed()->find($id);
                return view('Designation.details', compact('department'));
            } else {
                #Insert
                return view('Designation.details');
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validate($request, [
                // 'title'  => 'required|'.($request->id ? 'unique:designations,title,Null,id' : 'unique:designations,title,' . $request->id . ',id'),
                'title'  => 'required|unique:designations,title,' . $request->id . ',id',
                'department' => 'required',
                // 'departmentId' => 'nullable|exists:departments,id',
                'status' => 'required',
            ]);
            // return $request;
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

    public function view($id)
    {
        $designation = Designation::withTrashed()->find($id);
        return view('Designation.view', compact('designation'));
    }

    public function Designation(Request $request)
    {
        return Designation::withTrashed()->where('title', 'LIKE', "%{$request->name}%")->get();
    }

    public function export()
    {
        $arr =  [
            'name' => 'Povilas',
            'surname' => 'Korop',
            'email' => 'povilas@laraveldaily.com',
            'twitter' => '@povilaskorop'
        ];
        return Excel::download(new DesignationExport($arr), 'invoices.xlsx');
    }
}
