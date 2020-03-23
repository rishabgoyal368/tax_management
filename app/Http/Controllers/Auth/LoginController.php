<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  Admin::create([
        //     'first_name' => 'Testing',
        //     'last_name' => 'xyz',
        //     'email' => 'testsoftuvo@gmail.com',
        //     'password' => Hash::make('Admin@1234'),
        // ]);
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // Login
    public function login(Request $request)
    {
        // return $request;
        
        $rd = $request->all();
        $rd['email'] = strtolower($request->input('email'));
        $request->replace($rd);
        $input = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // return 'hhh';

            return redirect()->intended($this->redirectPath());
        } else {
            $message = 'Invalid Login.';
            return redirect()->back()->with(['error' => $message]);
        }
    }
}
