<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    //Admin Profile
    public function profile()
    {
        return view('admin.adminprofile');
    }
    
    public function update(Request $request)
    {
        return ($request->all());

        // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        //     return view('admin.adminprofile');
        // }
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $this->validate($request, [
        //         'first_name' =>  'required',
        //         'last_name' => 'required',
        //         'email' => 'required',
        //         'image' => 'required',
        //     ]);
        //     Admin::Update($request);
        //     return redirect('Job-listing-websites')->with(['success' => 'profile updated  successfully']);
        // }
    }
}
