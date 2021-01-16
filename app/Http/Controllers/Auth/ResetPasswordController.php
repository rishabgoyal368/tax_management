<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\ResetPassword;
use Mail;
use DB;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function res(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
    }


    public function reset(Request $request)
    {
        $input = $request->all();
        $validator = $this->res($input);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $admin = Admin::where('email', $request->email)->first();
            if (!empty($admin)) {
                 $user = ResetPassword::where('email', $request->email)->first();

                if (empty($user)) {
                    $message = 'No user exists with this email.';
                    return redirect('login')->with(['error' => $message]);
                } else {
                    //Update password
                    $admin->password = bcrypt($request->password);
                    $admin->save();

                    //Delete from passwords
                    $user = DB::table('reset_passwords')->where('email', $request->email)->delete();
                    $message = 'Your password updated successfully.';
                    return redirect('/login')->with(['success' => $message]);
                }
            } else {
                $message = 'You are not authorized to reset password.';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
