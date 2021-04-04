<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Helper;
use App\Invoice, App\InvoiceDetail;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $invoice_list = Invoice::with('user')->latest()->paginate(env('PAGINATE'));
        $label = 'Invoice-list';
        return view('Invoice.index', compact('invoice_list', 'label'));
    }

    public function view(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $update = InvoiceDetail::where('invoice_id', $id)->Update([
                'Final' => $data['Final'],
                'date_to' => $data['date_to'],
                'date_from' => $data['date_from'],
                'the_amount_of_the_tax_payable' => $data['the_amount_of_the_tax_payable'],
                'tax_previous_balance' => $data['tax_previous_balance'],
                'tax_total_paid' => $data['tax_total_paid'],
                'tax_paid_share_each_per_partner' => $data['tax_paid_share_each_per_partner'],
                'report_year' => $data['report_year'],
                'original' => $data['original'],
                'tax_period' => $data['tax_period']
            ]);
            return redirect()->back()->with(['success' => 'Invoice updated successfully']);
        }
        $invoice_detail = InvoiceDetail::where('invoice_id', $id)->first();
        // dd($invoice_detail);

        // $label = 'Invoice-list';
        return view('Invoice.view', compact('invoice_detail'));
    }
}
