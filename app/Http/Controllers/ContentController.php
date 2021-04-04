<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Content;
use Helper;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function content(Request $request)
    {
        $content = Content::get();
        return view('content.list', compact('content'));
    }

    public function add(Request $request, $id = null)
    {
        if ($request->isMethod('GET')) {
            if ($id) {
                $content =  Content::find($id);
            } else {
                $content =  [];
            }
            return view('content.add', compact('content'));
        } else if ($request->isMethod('POST')) {
            $this->validate($request, [
                'tax' =>  'required|unique:content,tax,' . @$request['id'], 'id',
                'content' => 'required',
            ]);
            $user =  Content::updateOrcreate(
                ['id' => @$request['id']],
                [
                    'tax' => $request['tax'],
                    'content' => $request['content'],
                ]
            );
            return redirect('/content')->with(['success' => 'Content updated successfully']);
        }
    }
}
