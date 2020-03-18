<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Imports\DesignationImport;
use App\Imports\JobListingWebsiteImport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function import(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'type'  => 'required',
            'import'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            $file_type =  $request->import->getClientOriginalExtension();
            if ($file_type == 'xlsx') {
                try {
                    switch ($request->type) {
                        case '1': # Designation 
                            $model = new DesignationImport;
                            break;
                        case '2': #Job listing website
                            $model = new JobListingWebsiteImport;
                    }
                    Excel::import($model, $request->import);
                    return response()->json(['success' => 'Imported Successfully']);
                } catch (\Exception $ex) {
                    return response()->json(['error' => $ex->getMessage()]);
                }
            } else {
                return response()->json(['error'=> 'The document must be a file of type: xlsx.']);
            }
        }
    }
}
