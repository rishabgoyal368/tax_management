<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Tax;
use App\User;
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
                $request['image'] = $fileName;
            }
            else{
                $request['image'] = Tax::where('id',$request['id'])->value('image');
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
}
