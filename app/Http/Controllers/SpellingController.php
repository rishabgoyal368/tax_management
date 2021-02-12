<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Spelling;
use Helper;


class SpellingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = Spelling::latest()->paginate(env('PAGINATE'));
        return view('Spelling.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Spelling::find($id);
                $label = 'Edit Spelling';
                return view('Spelling.add_edit', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add Spelling';
                $content['id'] = '';
                $content['image'] = '';
                return view('Spelling.add_edit', compact('content', 'label'));
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
                $fileName = Spelling::where('id', $request->id)->value('image');
                $request['file'] = $fileName;
            }

            if ($request->audio) {
                $fileName = time() . '.' . $request->audio->extension();
                $request->audio->move(public_path('uploads'), $fileName);
                $request['audio_file'] = $fileName;
            } else {
                $fileName = Spelling::where('id', $request->id)->value('audio');
                $request['audio_file'] = $fileName;
            }
            // return $request;
            $user =  Spelling::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-spellings')->with(['success' => 'Record ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:spellings,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Spelling::where('id', $request->id)->delete();
            return response()->json(['success' => 'Record deleted successfully.']);
        }
    }
}
