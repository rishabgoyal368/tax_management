<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Khani;
use App\Number;
use Helper;


class NumberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = Number::latest()->paginate(env('PAGINATE'));
        return view('Number.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Number::find($id);
                $label = 'Edit Number';
                return view('Number.add_edit', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add Number';
                $content['id'] = '';
                $content['image'] = '';
                return view('Number.add_edit', compact('content', 'label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'image' => $request['id'] ? 'nullable' : 'required',
                'description' => 'required',
                'audio' => $request['id'] ? 'nullable' : 'required',

            ]);
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['file'] = $fileName;
            } else {
                $fileName = Number::where('id', $request->id)->value('image');
                $request['file'] = $fileName;
            }

            if ($request->audio) {
                $fileName = time() . '.' . $request->audio->extension();
                $request->audio->move(public_path('uploads'), $fileName);
                $request['audio_file'] = $fileName;
            } else {
                $fileName = Number::where('id', $request->id)->value('audio');
                $request['audio_file'] = $fileName;
            }
            // return $request;
            $user =  Number::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-Number')->with(['success' => 'Record ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:number,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Number::where('id', $request->id)->delete();
            return response()->json(['success' => 'Records deleted successfully.']);
        }
    }
}
