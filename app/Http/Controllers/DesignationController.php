<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Designation;
use App\Department;
use Helper;


class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $GetDepartment = Department::get();
        $Designation = Designation::get();
        $master = $request->master;
        $status = $request->status;
        $department = $request->department;

        $departmentSort = $request->departmentSort;
        $indexSort = $request->indexSort;
        $titleSort = $request->titleSort;
        $statusSort = $request->statusSort;

        $result = Designation::orwhereHas('getDepartment', function ($query) use ($master, $departmentSort) {
            //Designer               
            if ($master) {
                $query->where('title', 'LIKE', "%{$master}%");
            }
            if ($departmentSort) {
                $query->orderBy('title', $departmentSort);
            }
        })->orWhere(function ($query) use ($master) {
            // if Name Search
            if ($master) {
                $query->where('title', 'LIKE', "%{$master}%");
                $query->orWhere('status', 'LIKE', "%{$master}%");
            }
        })->where(function ($query) use ($department, $status, $master) {
            // If currency
            if ($department) {
                $query->whereIn('department_id', $department);
            }
            // If Signup
            if ($status) {
                $query->whereIn('status', $status);
            }
        })->newQuery();
        if ($indexSort) {
            $result->orderBy('id', $indexSort);
        }
        // if ($departmentSort) {
        //     $result->orderBy('id', $departmentSort);
        // }

        if ($statusSort) {
            $result->orderBy('status', $statusSort);
        }
        if ($titleSort) {
            $result->orderBy('title', $titleSort);
        }

        $resultIds = clone $result;
        $id = $resultIds->pluck('id')->toArray();
        $ids = implode(',', $id);
        // return $GetDesignation = $result->toSql();

        $GetDesignation = $result->latest()->paginate(env('PAGINATE'));
        return view('Designation.list', compact('GetDesignation', 'ids', 'GetDepartment', 'Designation', 'status', 'department', 'master','indexSort','statusSort','titleSort'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $department = Designation::find($id);
                $label = 'Edit Designation';
                return view('Designation.details', compact('department','label'));
            } else {
                #Insert
                $label = 'Add Designation';
                return view('Designation.details',compact('label'));
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
