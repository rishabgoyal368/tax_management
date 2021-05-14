<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SalaryTax, App\CompanyEstablishment, App\AddDeductTax, App\Salary2Tax, App\FinancialList;
use Helper;

class NewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function salary_tax_list(Request $request)
    {
        $salary_tax_list = SalaryTax::with('user')->latest()->paginate(env('PAGINATE'));
        
        return view('salary_tax_list.list', compact('salary_tax_list'));
    }

    public function salary_tax_list_view($id){
        
        $salary_tax_detail = SalaryTax::with('user')->where('id',$id)->first();
        
        return view('salary_tax_list.view', compact('salary_tax_detail'));
    }
   
    public function company_establisment_list(Request $request)
    {
        $company_establisment_list = CompanyEstablishment::with('user')->latest()->paginate(env('PAGINATE'));
        return view('company_establisment_list.list', compact('company_establisment_list'));
    }

    public function company_establisment_list_view($id){
        
        $company_establisment_details = CompanyEstablishment::with('user')->where('id',$id)->first();
        
        return view('company_establisment_list.view', compact('company_establisment_details'));
    }
   

    public function add_deduct_Tax_list(Request $request)
    {
        $add_deduct_Tax_list = AddDeductTax::with('user')->latest()->paginate(env('PAGINATE'));
        return view('add_deduct_Tax_list.list', compact('add_deduct_Tax_list'));
    }

    public function add_deduct_Tax_view($id){
        
        $add_deduct_Tax__details = AddDeductTax::with('user')->where('id',$id)->first();
        // dd($add_deduct_Tax__details);
        return view('add_deduct_Tax_list.view', compact('add_deduct_Tax__details'));
    }
   

    public function salary2_tax_list(Request $request)
    {
        $salary2_tax_list = Salary2Tax::with('user')->latest()->paginate(env('PAGINATE'));
        return view('Salary_2_Tax_list.list', compact('salary2_tax_list'));
    }

    public function salary2_tax_list_view($id){
        
        $salary2_tax_details = Salary2Tax::with('user')->where('id',$id)->first();
  
        return view('Salary_2_Tax_list.view', compact('salary2_tax_details'));
    }


    public function financial_list(Request $request)
    {
        $financial_list = FinancialList::with('user')->latest()->paginate(env('PAGINATE'));
        return view('financial_list.list', compact('financial_list'));
    }

    public function financial_list_view($id){
        
        $financial_list_details = FinancialList::with('user')->where('id',$id)->first();
  
        return view('financial_list.view', compact('financial_list_details'));
    }
}
