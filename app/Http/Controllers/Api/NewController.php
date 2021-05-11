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
use App\User, App\SalaryTax, App\CompanyEstablishment, App\DummyThird, App\DummyForth;
use Auth;

class NewController extends Controller
{

    public function salary_tax_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'upload_photo_of_tax'       => 'required|max:10000|mimes:doc,docx',
            'company_contract'          => 'required|max:10000|mimes:doc,docx',
            'national_id'               => 'required|max:10000|mimes:doc,docx',
            'financial_budget'          => 'required|max:10000|mimes:doc,docx',
            'import_export_certificates'=> 'required|max:10000|mimes:doc,docx',
            'other_docs'                => 'required|max:10000|mimes:doc,docx',
            'commercial_certificate'    => 'required|max:10000|mimes:doc,docx',
            'additional_tax'            => 'required|max:10000|mimes:doc,docx',
            'office_lease_contract'     => 'required|max:10000|mimes:doc,docx',
            'social_insurance'          => 'required|max:10000|mimes:doc,docx',
            'construction_certificate'  => 'required|max:10000|mimes:doc,docx',
            'industrial_certificate'    =>'required|max:10000|mimes:doc,docx'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $salary_tax_add            = new SalaryTax;
        $salary_tax_add->user_id   = $user->id;

        if ($request->upload_photo_of_tax) {
            $fileName = time() . '1.' . $request->upload_photo_of_tax->extension();
            $request->upload_photo_of_tax->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->upload_photo_of_tax = $fileName;
        }
        if ($request->company_contract) {
            $fileName = time() . '2.' . $request->company_contract->extension();
            $request->company_contract->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->company_contract = $fileName;
        }
        if ($request->national_id) {
            $fileName = time() . '3.' . $request->national_id->extension();
            $request->national_id->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->national_id = $fileName;
        }
        if ($request->financial_budget) {
            $fileName = time() . '4.' . $request->financial_budget->extension();
            $request->financial_budget->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->financial_budget = $fileName;
        }
        if ($request->import_export_certificates) {
            $fileName = time() . '5.' . $request->import_export_certificates->extension();
            $request->import_export_certificates->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->import_export_certificates = $fileName;
        }
        if ($request->other_docs) {
            $fileName = time() . '6.' . $request->other_docs->extension();
            $request->other_docs->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->other_docs = $fileName;
        }
        if ($request->commercial_certificate) {
            $fileName = time() . '7.' . $request->commercial_certificate->extension();
            $request->commercial_certificate->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->commercial_certificate = $fileName;
        }
        if ($request->additional_tax) {
            $fileName = time() . '8.' . $request->additional_tax->extension();
            $request->additional_tax->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->additional_tax = $fileName;
        }
        if ($request->office_lease_contract) {
            $fileName = time() . '9.' . $request->office_lease_contract->extension();
            $request->office_lease_contract->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->office_lease_contract = $fileName;
        }
        if ($request->social_insurance) {
            $fileName = time() . '10.' . $request->social_insurance->extension();
            $request->social_insurance->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->social_insurance = $fileName;
        }

        if ($request->construction_certificate) {
            $fileName = time() . '11.' . $request->construction_certificate->extension();
            $request->construction_certificate->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->construction_certificate = $fileName;
        }
        if ($request->industrial_certificate) {
            $fileName = time() . '12.' . $request->industrial_certificate->extension();
            $request->industrial_certificate->move(public_path('salary_tax_add'), $fileName);
            $salary_tax_add->industrial_certificate = $fileName;
        }

        if ($salary_tax_add->save()) {
            return response()->json([
                'success' => true,
                'data' => $salary_tax_add
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function company_establishment_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'stock_partnership'     => 'required|max:10000|mimes:doc,docx',
                'partnerships_co'       => 'required|max:10000|mimes:doc,docx',
                'one_person_co'         => 'required|max:10000|mimes:doc,docx',
                'manufacturers'         => 'required|max:10000|mimes:doc,docx',
                'adjust'                => 'required|max:10000|mimes:doc,docx',
                'joint_stock_companies' => 'required|max:10000|mimes:doc,docx',
                'limited_liability'     => 'required|max:10000|mimes:doc,docx',
                'sole_company'          => 'required|max:10000|mimes:doc,docx',
                'branches'              => 'required|max:10000|mimes:doc,docx',
                'separation_of_exit'    => 'required|max:10000|mimes:doc,docx'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $company_establishment_add    = new CompanyEstablishment;
        $company_establishment_add->user_id   = $user->id;
        if ($request->stock_partnership) {
            $fileName = time() . '1.' . $request->stock_partnership->extension();
            $request->stock_partnership->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->stock_partnership = $fileName;
        }
        if ($request->partnerships_co) {
            $fileName = time() . '2.' . $request->partnerships_co->extension();
            $request->partnerships_co->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->partnerships_co = $fileName;
        }
        if ($request->one_person_co) {
            $fileName = time() . '3.' . $request->one_person_co->extension();
            $request->one_person_co->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->one_person_co = $fileName;
        }
        if ($request->manufacturers) {
            $fileName = time() . '4.' . $request->manufacturers->extension();
            $request->manufacturers->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->manufacturers = $fileName;
        }
        if ($request->adjust) {
            $fileName = time() . '5.' . $request->adjust->extension();
            $request->adjust->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->adjust = $fileName;
        }
        if ($request->joint_stock_companies) {
            $fileName = time() . '6.' . $request->joint_stock_companies->extension();
            $request->joint_stock_companies->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->joint_stock_companies = $fileName;
        }
        if ($request->limited_liability) {
            $fileName = time() . '7.' . $request->limited_liability->extension();
            $request->limited_liability->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->limited_liability = $fileName;
        }
        if ($request->sole_company) {
            $fileName = time() . '8.' . $request->sole_company->extension();
            $request->sole_company->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->sole_company = $fileName;
        }
        if ($request->branches) {
            $fileName = time() . '9.' . $request->branches->extension();
            $request->branches->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->branches = $fileName;
        }
        if ($request->separation_of_exit) {
            $fileName = time() . '10.' . $request->separation_of_exit->extension();
            $request->separation_of_exit->move(public_path('company_establishment_add'), $fileName);
            $company_establishment_add->separation_of_exit = $fileName;
        }
        if ($company_establishment_add->save()) {
            return response()->json([
                'success' => true,
                'data' => $company_establishment_add
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
                'file' => 'required|max:10000|mimes:doc,docx',
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
                'file' => 'required|max:10000|mimes:doc,docx',
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
