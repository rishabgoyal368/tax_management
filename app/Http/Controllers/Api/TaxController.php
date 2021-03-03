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

use App\AppSetting;
use App\Tax;

class TaxController extends Controller
{

    //get all tax
    public function taxList(Request $request)
    {
        $taxes = Tax::with('parent')->where('status','Active')->where('parent_id', 0)->get();
        // foreach ($taxes as $key => $tax) {
        //     $data[$key]['id'] = $tax['id']; 
        //     $data[$key]['name'] = $tax['name']; 
        //     $data[$key]['image'] = 'taxx'; 
        // }
        // return $data;
        return response()->json([
            'success' => true,
            'tax_list' => $taxes,
        ]);
    }
}
