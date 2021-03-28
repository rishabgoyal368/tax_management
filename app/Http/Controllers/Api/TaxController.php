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
use App\Tax, App\Content, App\SupplierData, App\BuyInvoice;
use Auth;

class TaxController extends Controller
{

    //get all tax
    public function taxList(Request $request)
    {
        $taxes = Tax::with('parent')->where('status', 'Active')->where('parent_id', 0)->get();
        return response()->json([
            'success' => true,
            'tax_list' => $taxes,
        ]);
    }

    public function supplier_data_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'invoice_date' => 'required|date_format:Y-m-d',
                'national_id_no' => 'required|numeric',
                'address' => 'required',
                'invoice_no' => 'required|numeric',
                'supplier_name' => 'required',
                'file_no' => 'required|numeric',
                'tax_registration_no' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $supplier_data                        = new SupplierData;
        $supplier_data->user_id               = $user->id;
        $supplier_data->invoice_date          = $request->invoice_date;
        $supplier_data->national_id_no        = $request->national_id_no;
        $supplier_data->address               = $request->address;
        $supplier_data->supplier_name         = $request->supplier_name;
        $supplier_data->file_no               = $request->file_no;
        $supplier_data->invoice_no            = $request->invoice_no;
        $supplier_data->tax_registration_no   = $request->tax_registration_no;
        if ($supplier_data->save()) {
            return response()->json([
                'success' => true,
                'data' => $supplier_data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function buy_invoice_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_code' => 'required',
                'product_name' => 'required',
                'unites' => 'required',
                'unit_price' => 'required|numeric',
                'total_line' => 'required',
                'invoice_type' => 'required',
                'product_type' => 'required',
                'quantity' => 'required|numeric',
                'tax_category' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $buy_invoice                       = new BuyInvoice;
        $buy_invoice->user_id           = $user->id;
        $buy_invoice->product_code      = $request->product_code;
        $buy_invoice->product_name      = $request->product_name;
        $buy_invoice->unites            = $request->unites;
        $buy_invoice->unit_price        = $request->unit_price;
        $buy_invoice->total_line        = $request->total_line;
        $buy_invoice->invoice_type      = $request->invoice_type;
        $buy_invoice->product_type       = $request->product_type;
        $buy_invoice->quantity           = $request->quantity;
        $buy_invoice->tax_category       = $request->tax_category;
        if ($request->image) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/buy_invoice'), $fileName);
            $buy_invoice->image = $fileName;
        }
        if ($buy_invoice->save()) {
            return response()->json([
                'success' => true,
                'data' => $buy_invoice
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function getContent(Request $request)
    {
        $id = $request['id'];
        $content = Content::where('tax',$id)->first();
        return response()->json([
            'success' => true,
            'data' => $content
        ]);
    }
}
