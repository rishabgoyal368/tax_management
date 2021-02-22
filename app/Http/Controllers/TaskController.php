<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\task;
use App\User;
use Helper;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $tasks = task::latest()->paginate(env('PAGINATE'));
        return view('tasks.list', compact('tasks'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $tasks = array(
                [
                    'id' => '1',
                    'task_name' => 'test data1',
                ],
                [
                    'id' => '2',
                    'task_name' => 'test data2',
                ],
                [
                    'id' => '3',
                    'task_name' => 'test data3',
                ],
            );
            $users = User::where('status','Active')->get();
            if ($id) {
                #Update
                $task = task::find($id);
                $label = 'Edit User';
                return view('tasks.add_edit', compact('users', 'label','task','tasks'));
            } else {
                #Insert
                $label = 'Add User';
                return view('tasks.add_edit', compact('label', 'users','tasks'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'status' => 'required',
                'user' => 'required',
            ]);
            $user =  task::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/task-list')->with(['success' => 'Task ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:tasks,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            task::where('id', $request->id)->delete();
            return response()->json(['success' => 'Task deleted successfully.']);
        }
    }
}
