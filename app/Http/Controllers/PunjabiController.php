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
use App\Lipi;
use App\Khani;
use App\Spelling;
use App\Number;

class PunjabiController extends Controller
{

    public function getGurumukhi(Request $request)
    {
        $content = Content::latest()->get();
        return response()->json(['content' => $content, 'code' => 200]);
    }

    public function getContent(Request $request)
    {
        $type = $request['type'];
        switch ($type) {
            case 'Content':
                $content = Content::orderBy('order','ASC')->get();
                break;
            case 'Lipi':
                $content = Lipi::latest()->get();
                break;
            case 'Khani':
                $content = Khani::latest()->get();
                break;
            case 'Spelling':
                $content = Spelling::latest()->get();
                break;
            case 'Number':
                    $content = Number::latest()->get();
                    break;
            default:
                $content = Content::latest()->get();
                break;
        }

        return response()->json(['content' => $content, 'code' => 200]);
    }
}
