<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exports\JobListingWebsiteExport;
use Maatwebsite\Excel\Facades\Excel;

use App\JobListingWebsite;
use Helper;


class JobListingWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show(Request $request)
    {
        $master = $request->master;
        $plateform = $request->webplateform;
        $email = $request->webemail;
        $status = $request->webstatus;
        $index = $request->index;
        $searchplateform = $request->PlateformName;
        $searchemail = $request->Emailname;
        $searchstatus = $request->Statusname;
        $searchlink = $request->LinkName;
        // return $request;
        $joblist = JobListingWebsite::withTrashed()->get();
        $result = JobListingWebsite::withTrashed()->where(function ($query) use ($master, $plateform, $email, $status) {
            // Master Search
            if ($master) {
                $query->where('name', 'LIKE', "%{$master}%");
                $query->orWhere('email', 'LIKE', "%{$master}%");
                $query->orWhere('website', 'LIKE', "%{$master}%");
            }
            if ($plateform) {
                $query->whereIn('name', $plateform);
            }
            if ($email) {
                $query->whereIn('email', $email);
            }
            if ($status) {
                $query->whereIn('status', $status);
            }
        })->newQuery();
        if ($index) {
            $result->orderBy('id', $index);
        }
        if ($searchplateform) {
            $result->orderBy('name', $searchplateform);
        }
        if ($searchemail) {
            $result->orderBy('email', $searchemail);
        }
        if ($searchstatus) {
            $result->orderBy('status', $searchstatus);
        }
        if ($searchlink) {
            $result->orderBy('website', $searchlink);
        }
        $resultIds = clone $result;
        $id = $resultIds->pluck('id')->toArray();
        $ids = implode(',', $id);
        $jobListing = $result->paginate(env('PAGINATE'));
        return view('JobListingWebsite.list', compact('jobListing', 'joblist', 'plateform', 'email', 'status', 'master', 'index', 'searchplateform', 'searchemail', 'searchstatus', 'searchlink', 'ids'));
    }

    public function add(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('JobListingWebsite.add');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' =>  'required|alpha_num|max:100|unique:job_listing_websites,name,' . $request['id'] . ',id,email,' . $request['email'] . ',deleted_at,NULL',
                'websiteLink' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
                'status' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                JobListingWebsite::addorUpdate($request);
                $response = @$request->id ? 'updated' : 'added';
                return redirect('Job-listing-websites')->with(['success' => 'Job Listing Websites ' . $response . ' successfully']);
            }
        }
    }

    public function edit(Request $request, $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $jobadd = JobListingWebsite::withTrashed()->find($id);
            return view('JobListingWebsite.add', compact('jobadd'));
        }
    }

    public function display(Request $request, $id)
    {
        $jobshow = JobListingWebsite::withTrashed()->find($id);
        return view('JobListingWebsite.details', compact('jobshow'));
    }

    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:job_listing_websites,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            JobListingWebsite::remove($request->id);
            return response()->json(['success' => 'JobListingWebsite deleted successfully.']);
        }
    }

    //-----------------------------------export-------------------------------------------

    public function export(Request $request)
    {
        $ids =   explode(',', $request['id']);
        $data =  JobListingWebsite::withTrashed()->whereIn('id', $ids)->get()->toArray();
        foreach ($data as $value) {
            $arr[] = array(
                'name' => $value['name'],
                'websitelink' => $value['website'],
                'Email' => $value['email'],
                'Status' => $value['status'],
                'Password' => $value['password'],
            );
        }
        return Excel::download(new JobListingWebsiteExport($arr), 'Job_listing_website.xlsx');
    }

    //---------------------------individualy passwword update--------------------------

    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'password' => 'required|min:6|max:20',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        } else {
            JobListingWebsite::Updatepassword($data);
            // return redirect('Job-listing-websites')->with(['success' => 'Password change successfully']);
            return 'true';
        }
    }
}
