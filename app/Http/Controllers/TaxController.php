<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Tax;
use App\User, App\SupplierData, App\BuyInvoice;
use Helper;


class TaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $taxs = Tax::latest()->paginate(env('PAGINATE'));
        return view('tax.list', compact('taxs'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $taxes = Tax::get();
            $users = User::where('status','Active')->get();
            if ($id) {
                #Update
                $task = Tax::find($id);
                $label = 'Edit Tax';
                return view('tax.add_edit', compact('users', 'label','task','taxes'));
            } else {
                #Insert
                $label = 'Add Tax';
                return view('tax.add_edit', compact('label', 'users','taxes'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'status' => 'required',
                'image' => $request['id'] ? 'nullable|mimes:jpeg,jpg,png,gif|max:10000' : 'required|mimes:jpeg,jpg,png,gif|max:10000',
            ]);
            $request['parent_id'] = $request['parent_id'] ?: '0';
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['logo'] = $fileName;
            }
            else{
                $tax  = Tax::where('id',$request['id'])->first();
                $request['logo'] = $tax->getAttributes()['image'];
            }
            // return $request;
            $user =  tax::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-tax')->with(['success' => 'Tax ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:tasks,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            task::where('id', $request->id)->delete();
            return response()->json(['success' => 'Task deleted successfully.']);
        }
    }

    public function suplier_data_list(){
        $supplier_data_list = SupplierData::with('user')->latest()->paginate(env('PAGINATE'));
        return view('SupplierData.list', compact('supplier_data_list'));
    }

    public function view_supplier_data($id){
        $view_supplier_data = SupplierData::where('id', $id)->with('user')->first();
        return view('SupplierData.view', compact('view_supplier_data'));

    }

    public function send_notify_page(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            dd($data);
        }
    }

    public function buy_invoice_list(){
        $buy_invoice_list = BuyInvoice::with('user')->latest()->paginate(env('PAGINATE'));
        return view('BuyInvoice.list', compact('buy_invoice_list'));
    }

    public function view_buy_invoice(Request $request, $id){
        $view_buy_invoice = BuyInvoice::where('id', $id)->with('user')->first();
        return view('BuyInvoice.view', compact('view_buy_invoice'));
    }


}
