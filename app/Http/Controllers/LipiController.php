<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Lipi;
use App\Department;
use Helper;


class LipiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = Lipi::latest()->paginate(env('PAGINATE'));
        return view('lipi.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Lipi::find($id);
                $label = 'Edit Lipi';
                return view('lipi.add_edit', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add Lipi';
                $content['id'] = '';
                $content['image'] = '';
                return view('lipi.add_edit', compact('content', 'label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'image' => $request['id'] ? 'nullable' : 'required',
                'description' => 'required',
                // 'order' => 'required|numeric',
            ]);
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['file'] = $fileName;
            } else {
                $fileName = Lipi::where('id', $request->id)->first();
                $request['file'] = $fileName->getOriginal('image');
            }
            // return $request;
            $user =  Lipi::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-lipi')->with(['success' => 'Lipi ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:lipi,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            lipi::where('id', $request->id)->delete();
            return response()->json(['success' => 'Records deleted successfully.']);
        }
    }
}
