<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Admin;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {

        // $admin = new Admin();
        //    $admin->email = $request->input('email');
        //    $admin->password = bcrypt($request->input('password'));
        //    $admin->save();
        //    return 'true';
        return view('index');
    }
//----------------------------------update adminprofile------------------------------------------

    public function update(Request $request)
    {
        // return ($request->all());
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminprofile');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
            'first_name' =>  'required',
                'last_name' => 'required',
                'email' => 'required',
                'image' => 'required',
            ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        

        Admin::Updates($data);
        return redirect('Job-listing-websites')->with(['success' => 'profile updated  successfully']);
        }
    }

    
    public function updatepassword(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminpassword');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            Admin::Updatepassword($data);
            return redirect('Job-listing-websites')->with(['success' => 'profile updated  successfully']);
        }
    }
}
