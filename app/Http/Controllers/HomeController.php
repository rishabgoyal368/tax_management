<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function reauthenticate(request $request)
    {  
        if (Auth::guard('admin')->attempt(['email' => Auth::user()->email, 'password' => $request->password]))
         {
            return response()->json(['success' => 'Password verified.']);
         } else {
            return response()->json(['error' => 'Invalid Password.']); 
         }
    }
}
