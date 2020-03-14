<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Str;
use App\Admin;
use App\ResetPassword;
use Mail;
use DB;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Reover password
    public function sendResetLinkEmail(Request $request)
    {
        $checkUser = [];
        $adminData = Admin::where('email', strtolower($request->email))->first();
        if (empty($adminData)) {
            $message = 'You are not authorized to reset password .';
            return redirect()->back()->with(['error' => $message]);
        } else {
            $resetPasswrd = ResetPassword::where('email', $request->email)->first();
            $token = Str::random(40) . time();
            if (empty($resetPasswrd)) {
                $checkUser =  DB::table('reset_passwords')->insert(
                    ['email' => $request->email, 'token' => $token]
                );
            } else {

                $checkUser = DB::table('reset_passwords')->where('email', $resetPasswrd['email'])->update(['token' => $token]);
            }
            $data['url'] = env('APP_URL') . '/password/reset/' . $token;
            $email = $request->email;

            if (!empty($checkUser)) {
                // return env('MAIL_USERNAME');

                Mail::send('emails.admin.forget', $confirmed = array('user_info' => $data), function ($message) use ($email) {
                    $message->to($email)->from(env('MAIL_USERNAME'), env('APP_NAME'))->subject('Reset your password');
                });
                $message = 'Please check your email to reset password.';
                return redirect()->back()->with(['success' => $message]);
            } else {
                $message = 'Enter Correct mail';
                return redirect()->back()->with(['error' => $message]);
            }
        }
    }
}
