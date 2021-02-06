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

use App\User;
use App\Content;

class PunjabiController extends Controller
{

    public function getGurumukhi(Request $request)
    {
        $content = Content::latest()->get();
        return response()->json(['content' => $content, 'code' => 200]);
    }

}
