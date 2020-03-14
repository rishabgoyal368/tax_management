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

    public function getDepartment(Request $request)
    {
        return Department::where('title', 'LIKE', "%{$request->name}%")->get();
    }
}
