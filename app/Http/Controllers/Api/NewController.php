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
use App\User, App\SalaryTax, App\CompanyEstablishment, App\AddDeductTax, App\Salary2Tax, App\FinancialList;
use Auth;

class NewController extends Controller
{

    public function salary_tax_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'upload_photo_of_tax'       => 'required',
            'company_contract'          => 'required',
            'national_id'               => 'required',
            'financial_budget'          => 'required',
            'import_export_certificates'=> 'required',
            'other_docs'                => 'required',
            'commercial_certificate'    => 'required',
            'additional_tax'            => 'required',
            'office_lease_contract'     => 'required',
            'social_insurance'          => 'required',
            'construction_certificate'  => 'required',
            'industrial_certificate'    =>'required'
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
                'stock_partnership'     => 'required',
                'partnerships_co'       => 'required',
                'one_person_co'         => 'required',
                'manufacturers'         => 'required',
                'adjust'                => 'required',
                'joint_stock_companies' => 'required',
                'limited_liability'     => 'required',
                'sole_company'          => 'required',
                'branches'              => 'required',
                'separation_of_exit'    => 'required'
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

    public function add_deduct_taxes_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'buy_invoice'           => 'required',
                'deduct_notice_paper'   => 'required',
                'other_docs'            => 'required',
                'payment_agreement'     => 'required',
                'form_no_41'            => 'required'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $add_deduct_taxes_add            = new AddDeductTax;
        $add_deduct_taxes_add->user_id   = $user->id;
        if ($request->buy_invoice) {
            $fileName = time() . '1.' . $request->buy_invoice->extension();
            $request->buy_invoice->move(public_path('add_deduct_taxes'), $fileName);
            $add_deduct_taxes_add->buy_invoice = $fileName;
        }
        if ($request->deduct_notice_paper) {
            $fileName = time() . '2.' . $request->deduct_notice_paper->extension();
            $request->deduct_notice_paper->move(public_path('add_deduct_taxes'), $fileName);
            $add_deduct_taxes_add->deduct_notice_paper = $fileName;
        }
        if ($request->other_docs) {
            $fileName = time() . '3.' . $request->other_docs->extension();
            $request->other_docs->move(public_path('add_deduct_taxes'), $fileName);
            $add_deduct_taxes_add->other_docs = $fileName;
        }
        if ($request->payment_agreement) {
            $fileName = time() . '4.' . $request->payment_agreement->extension();
            $request->payment_agreement->move(public_path('add_deduct_taxes'), $fileName);
            $add_deduct_taxes_add->payment_agreement = $fileName;
        } 
        if ($request->form_no_41) {
            $fileName = time() . '5.' . $request->form_no_41->extension();
            $request->form_no_41->move(public_path('add_deduct_taxes'), $fileName);
            $add_deduct_taxes_add->form_no_41 = $fileName;
        }
        if ($add_deduct_taxes_add->save()) {
            return response()->json([
                'success' => true,
                'data' => $add_deduct_taxes_add
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }

    public function salary2_taxes_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'upload_hiring_list'    => 'required',
                'upload_pay_slip'       => 'required',
                'upload_national_id'    => 'required',
                'upload_insured'        => 'required',
                'upload_salaries_list'  => 'required',
                'upload_deductions'     => 'required',
                'upload_benefits'       => 'required',
                'upload_resigning'      => 'required'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

         $salary2_taxes_add              = new Salary2Tax;
        $salary2_taxes_add->user_id      = $user->id;
        if ($request->upload_hiring_list) {
            $fileName = time() . '1.' . $request->upload_hiring_list->extension();
            $request->upload_hiring_list->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_hiring_list = $fileName;
        }
        if ($request->upload_pay_slip) {
            $fileName = time() . '2.' . $request->upload_pay_slip->extension();
            $request->upload_pay_slip->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_pay_slip = $fileName;
        }
        if ($request->upload_national_id) {
            $fileName = time() . '3.' . $request->upload_national_id->extension();
            $request->upload_national_id->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_national_id = $fileName;
        }
        if ($request->upload_insured) {
            $fileName = time() . '4.' . $request->upload_insured->extension();
            $request->upload_insured->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_insured = $fileName;
        }
        if ($request->upload_salaries_list) {
            $fileName = time() . '5.' . $request->upload_salaries_list->extension();
            $request->upload_salaries_list->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_salaries_list = $fileName;
        }
        if ($request->upload_deductions) {
            $fileName = time() . '6.' . $request->upload_deductions->extension();
            $request->upload_deductions->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_deductions = $fileName;
        }
        if ($request->upload_benefits) {
            $fileName = time() . '7.' . $request->upload_benefits->extension();
            $request->upload_benefits->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_benefits = $fileName;
        }
        if ($request->upload_resigning) {
            $fileName = time() . '8.' . $request->upload_resigning->extension();
            $request->upload_resigning->move(public_path('salary2_taxes'), $fileName);
            $salary2_taxes_add->upload_resigning = $fileName;
        }
        if ($salary2_taxes_add->save()) {
            return response()->json([
                'success' => true,
                'data' => $salary2_taxes_add
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }


    public function financial_list_add(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'yearly_budget'    => 'required'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'success' => false], 200);
        }

        $user = JWTAuth::parseToken()->authenticate();

        $financial_list_add                 = new FinancialList;
        $financial_list_add->user_id        = $user->id;
        if ($request->yearly_budget) {
            $fileName = time() . '1.' . $request->yearly_budget->extension();
            $request->yearly_budget->move(public_path('financial_list_add'), $fileName);
            $financial_list_add->yearly_budget = $fileName;
        }
        if ($financial_list_add->save()) {
            return response()->json([
                'success' => true,
                'data' => $financial_list_add
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong,Please try again later.'
            ]);
        }
    }
}
