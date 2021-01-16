<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\User;
use App\Department;
use Helper;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = User::latest()->paginate(env('PAGINATE'));
        return view('users.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $department = User::find($id);
                $label = 'Edit User';
                return view('users.list', compact('department','label'));
            } else {
                #Insert
                $label = 'Add User';
                return view('users.add_edit',compact('label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request['department_id'] = Department::checkOrCreate(@$request->department);

            $this->validate($request, [
                'title' =>  'required|unique:designations,title,' . $request['id'] . ',id,department_id,' . $request['department_id'] . ',deleted_at,NULL',
                'department' => 'required',
                'status' => 'required',
            ]);
            $request['department_id'] = Department::checkOrCreate($request->department);
            Designation::addorUpdate($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('/designation')->with(['success' => 'Designation ' . $response . ' successfully']);
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
        $designation = Designation::find($id);
        return view('Designation.view', compact('designation'));
    }

    public function Designation(Request $request)
    {
        return Designation::withTrashed()->where('title', 'LIKE', "%{$request->name}%")->get();
    }

    public function export(Request $request)
    {
        $ids =   explode(',', $request['id']);
        $data =  Designation::withTrashed()->with('getDepartment')->whereIn('id', $ids)->latest()->get()->toArray();
        foreach ($data as $value) {
            // $status =  Helper::status($value['status']);
            $arr[] = array(
                'Designation' => $value['title'],
                'department' => $value['get_department']['title'],
                'status' => $value['status'],
            );
        }
        return Excel::download(new DesignationExport($arr), 'designation.xlsx');
    }
}
