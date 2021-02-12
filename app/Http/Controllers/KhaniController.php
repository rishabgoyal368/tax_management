<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Khani;
use App\Department;
use Helper;


class KhaniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = Khani::latest()->paginate(env('PAGINATE'));
        return view('khani.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Khani::find($id);
                $label = 'Edit khani';
                return view('khani.add_edit', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add khani';
                $content['id'] = '';
                $content['image'] = '';
                return view('khani.add_edit', compact('content', 'label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'image' => $request['id'] ? 'nullable' : 'required',
                'khani' => 'required',
                'audio' => $request['id'] ? 'nullable' : 'required',

            ]);
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['file'] = $fileName;
            } else {
                $fileName = Khani::where('id', $request->id)->value('image');
                $request['file'] = $fileName;
            }

            if ($request->audio) {
                $fileName = time() . '.' . $request->audio->extension();
                $request->audio->move(public_path('uploads'), $fileName);
                $request['audio_file'] = $fileName;
            } else {
                $fileName = Khani::where('id', $request->id)->first();
                $request['audio_file'] = $fileName->getOriginal('audio');
            }
            // return $request;
            $user =  Khani::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-khani')->with(['success' => 'Record ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:khani,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Khani::where('id', $request->id)->delete();
            return response()->json(['success' => 'Records deleted successfully.']);
        }
    }
}
