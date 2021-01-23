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
                $user = User::find($id);
                $label = 'Edit User';
                return view('users.add_edit', compact('user', 'label'));
            } else {
                #Insert
                $label = 'Add User';
                $user['id'] = '';
                return view('users.add_edit', compact('label', 'user'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'email' => 'required',
                'phone_number' => 'required',
                'password' => $request['id'] ? 'nullable' : 'required|confirmed',
                'status' => 'required',
            ]);
            $user =  User::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-user')->with(['success' => 'User ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            User::where('id', $request->id)->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }
    }
}
