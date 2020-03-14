<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;


class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function show()
    {
        $department = Department::paginate(env('PAGINATE'));
        return view('Department.list',compact('department'));
    }

    public function add(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('JobListingWebsite.add');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validate($request, [
                'name'  => 'required',
                'websiteLink' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            JobListingWebsite::add($request);
            return redirect()->back()->with(['success' => 'Job Listing Websites added successfully']);
        }
    }
}
