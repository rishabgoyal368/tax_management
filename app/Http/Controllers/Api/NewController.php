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
use App\User, App\DummyOne, App\DummySeconds;
use Auth;

class NewController extends Controller
{

    public function first_dummy_add(Request $request){
    	$validator = Validator::make(
           $request->all(),
            [
                'file' => 'required|max:10000|mimes:doc,docx',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(),'success' => false], 200);
        }
   		
        $user = JWTAuth::parseToken()->authenticate();  

        $dummy_one            = new DummyOne;
        $dummy_one->user_id   = $user->id;
        if($request->file)
        {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_one->file = $fileName;
        }
        if($dummy_one->save()){
            return response()->json([
                'success' => true,
                'data'=>$dummy_one
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'Something went wrong,Please try again later.'
            ]);
        }

    }

    public function second_dummy_add(Request $request){
        $validator = Validator::make(
           $request->all(),
            [
                'file' => 'required|max:10000|mimes:doc,docx',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(),'success' => false], 200);
        }
        
        $user = JWTAuth::parseToken()->authenticate();  

        $dummy_one            = new DummySeconds;
        $dummy_one->user_id   = $user->id;
        if($request->file)
        {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_one->file = $fileName;
        }
        if($dummy_one->save()){
            return response()->json([
                'success' => true,
                'data'=>$dummy_one
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message'=>'Something went wrong,Please try again later.'
            ]);
        }

    }
}
