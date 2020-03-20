<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exports\DesignationExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Designation;
use App\Department;
use Helper;


class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function show(Request $request)
    {
    }

    public function add(Request $request, $id = null)
    {
    }

    public function delete(Request $request)
    {
    }

    public function view($id)
    {
    }
}
