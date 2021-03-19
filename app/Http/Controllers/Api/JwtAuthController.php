<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use JWTAuth;
use Validator;
use AppUser;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\AppSetting;
use App\User;
use Auth, Mail;
class JwtAuthController extends Controller
{
    public $token = true;

    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'c_password' => 'required|same:password',
                'phone_number' => 'required|numeric',
                'job' => 'required',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(),'success' => false], 200);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verify = 0;
        $user->profile_pic = '';
        $user->job = $request->job;
        $user->phone_number = $request->phone_number;
        $user->status = 'Active';
        $user->save();

        // if ($this->token) {
        //     return $this->login($request);
        // }

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(),'success' => false], 200);
        }

        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }
        $generate_token= $request->device_token;
        $user_id = Auth::User()->id;
        $user = User::where('id',$user_id)->update(['device_token'=>$generate_token]);
       
        return response()->json([
            'device_token'=>$generate_token,
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out Successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ]);
        }
    }

    public function getUser(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();        
        return response()->json(['user' => $user]);
    }

    public function setting(Request $request)
    {
       $AppSetting = AppSetting::latest()->first();
       return response()->json([
        'data' => $AppSetting,
        'success' => true,
        'message' => 'App Setting update Successfully',
    ]);
    }

    public function updateProfile(Request $request)
    {
        // return $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'phone_number' => 'required',
                'name' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(),'success' => false], 200);
        }
        else{
            $user = JWTAuth::parseToken()->authenticate();
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->name = $request->name;
            if($request->image)
            {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $user->profile_pic = $fileName;
            }
            $user->save();
            return response()->json([
                'data' => $user ,
                'success' => true,
                'message' => 'User Profile updated successfull.',
            ]);
        }
    }


    public function forgot_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'      => 'required|email',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $check_email_exists = User::where('email', $request['email'])->first();
        if (empty($check_email_exists)) {
            return response()->json(['error' => 'Email not exists.'], 200);
        }


        $check_email_exists->email_verify           =  rand(1111, 9999);
        if ($check_email_exists->save()) {
            $project_name = env('App_name');
            $email = $request['email'];
            try {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    Mail::send('emails.user_forgot_password_api', ['name' => ucfirst($check_email_exists['first_name']) . ' ' . $check_email_exists['last_name'], 'otp' => $check_email_exists['email_verify']], function ($message) use ($email, $project_name) {
                        $message->to($email, $project_name)->subject('User Forgot Password');
                    });
                }
            } catch (Exception $e) {
            }
            return response()->json(['success' => true, 'data' => 'Email sent on registered Email-id.'], Response::HTTP_OK);
        } else {
            return response()->json(['error' => false, 'data' => 'Something went wrong, Please try again later.']);
        }
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'secret_key'       =>  'required|numeric',
                'email'      => 'required|email',
                'password'   => 'required',
                'confirm_password' => 'required_with:password|same:password'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 200);
        }


        $email = $data['email'];
        $check_email = User::where('email', $email)->first();
        if (empty($check_email['secret_key'])) {
            return response()->json(['error' => 'Something went wrong, Please try again later.']);
        }
        if (empty($check_email)) {
            return response()->json(['error' => 'This Email-id is not exists.']);
        } else {
            if ($check_email['secret_key'] == $data['secret_key']) {
                $hash_password                  = Hash::make($data['password']);
                $check_email->password          = str_replace("$2y$", "$2a$", $hash_password);
                $check_email->email_verify      = null;
                if ($check_email->save()) {
                    return response()->json(['success' => true, 'message' => 'Password changed successfully.']);
                } else {
                    return response()->json(['error' => 'Something went wrong, Please try again later.']);
                }
            } else {
                return response()->json(['error' => 'secret_key mismatch']);
            }
        }
    }

}
