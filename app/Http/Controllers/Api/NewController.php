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
use App\User, App\DummyOne, App\DummySecond, App\DummyThird, App\DummyForth;
use Auth;

class NewController extends Controller
{

    public function first_dummy_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|max:10000',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $dummy_one            = new DummyOne;
        $dummy_one->user_id   = $user->id;
        if ($request->file) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_one->file = $fileName;
        }
        if ($dummy_one->save()) {
            return response()->json([
                'success' => true,
                'data' => $dummy_one
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function second_dummy_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|max:10000',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $dummy_second            = new DummySecond;
        $dummy_second->user_id   = $user->id;
        if ($request->file) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_second->file = $fileName;
        }
        if ($dummy_second->save()) {
            return response()->json([
                'success' => true,
                'data' => $dummy_second
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function third_dummy_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|max:10000',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $dummy_third            = new DummyThird;
        $dummy_third->user_id   = $user->id;
        if ($request->file) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_third->file = $fileName;
        }
        if ($dummy_third->save()) {
            return response()->json([
                'success' => true,
                'data' => $dummy_third
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function forth_dummy_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|max:10000',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $dummy_forth            = new DummyForth;
        $dummy_forth->user_id   = $user->id;
        if ($request->file) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file'), $fileName);
            $dummy_forth->file = $fileName;
        }
        if ($dummy_forth->save()) {
            return response()->json([
                'success' => true,
                'data' => $dummy_forth
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }
}
