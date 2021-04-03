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
use App\Invoice, App\InvoiceDetail; 
use Auth;

class InvoiceController extends Controller
{
    public function add_invoice(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'company_name' => 'required',
                'company_national_id' => 'required|numeric',
                'company_address' => 'required',
                'tax_registration_number' => 'required|numeric',
                'type_of_business' => 'required'
            ]
        );

        if ($validator->fails()) {
			$response['code'] = 404;
            $response['status'] = $validator->errors()->first();
            $response['message'] = "missing parameters";
            return response()->json($response);
        }

        try {

	        $user = JWTAuth::parseToken()->authenticate();

			$invoice = Invoice::Create([
							'user_id'=>$user->id,
							'company_name'=>$request->company_name,
							'company_national_id'=>$request->company_national_id,
							'company_address'=>$request->company_address,
							'tax_registration_number'=>$request->tax_registration_number,
							'type_of_business'=>$request->type_of_business]);
	        $InvoiceDetail = InvoiceDetail::Create(['invoice_id'=>$invoice->id]);
	        return response()->json([
	                'success' => true,
	                'data' => $invoice
	           ]);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['message' => 'Something went wrong, Please try again later.', 'code' => 400]);
        }
    }
}
