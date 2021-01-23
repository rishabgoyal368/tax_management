<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Content;
use App\Department;
use Helper;


class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
        $users = Content::latest()->paginate(env('PAGINATE'));
        return view('content.list', compact('users'));
    }

    public function add(Request $request, $id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $content = Content::find($id);
                $label = 'Edit Content';
                return view('content.add_edit', compact('content', 'label'));
            } else {
                #Insert
                $label = 'Add Content';
                $content['id'] = '';
                $content['image'] = '';
                return view('content.add_edit', compact('content', 'label'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'image' => $request['id'] ? 'nullable' : 'required',
                'content' => 'required',
            ]);
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $request['file'] = $fileName;
            } else {
                $fileName = Content::where('id', $request->id)->value('image');
                $request['file'] = $fileName;
            }

            $user =  Content::addEdit($request);
            if ($request['id']) {
                $label = 'Updated';
            } else {
                $label = 'Add';
            }
            return redirect('/manage-content')->with(['success' => 'User ' . $label . ' successfully']);
        }
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:content,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            Content::where('id', $request->id)->delete();
            return response()->json(['success' => 'Content deleted successfully.']);
        }
    }
}
