<?php

namespace App\Http\Controllers;

use JWTAuth;
use Validator;
use AppUser;
use IlluminateHttpRequest;
use AppHttpRequestsRegisterAuthRequest;
use TymonJWTAuthExceptionsJWTException;
use SymfonyComponentHttpFoundationResponse;
use Illuminate\Http\Request;

use App\AppSetting;
use App\User;

class JwtAuthController extends Controller
{
    public $token = true;

    public function register(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 401);
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verify = 0;
        $user->profile_pic = '';
        // $user->phone_number = $request->phone_number;
        $user->status = 'Active';
        $user->save();

        if ($this->token) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], Response::HTTP_OK);
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

            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }

        return response()->json([
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
                'message' => 'User logged out successfully'
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
        'success' => false,
        'message' => 'Invalid Email or Password',
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
            return response()->json(['error' => $validator->errors()], 401);
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
}
