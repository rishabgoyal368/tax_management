<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin');
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
    public function login(Request $request)
    {
        $ab = Admin::where('email', $request->email)->get();
        return $ab;
        if (Auth::guard('admin')->attempt(['email' == $request->email, 'password' == $request->password])) {
            return 'login';
        }
    }
    public function logout(Request $request)
    {
        return redirect('/loginpage')->with('danger', 'credential not match');
    }
}
