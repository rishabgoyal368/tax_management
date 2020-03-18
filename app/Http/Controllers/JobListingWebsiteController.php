<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JobListingWebsite;
use App\Exports\JobListingWebsiteExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $link = $request->webplateform;
        $email = $request->webemail;
        $status = $request->webstatus;
        $index = $request->index;
        $searchplateform = $request->PlateformName;
        $searchemail = $request->Emailname;
        $searchstatus = $request->Statusname;
        $searchlink = $request->LinkName;
        // $password = $request->password;

        $joblist = JobListingWebsite::withTrashed()->get();
        $result = JobListingWebsite::withTrashed()->where(function ($query) use ($master, $link, $email, $status) {
            // Master Search
            if ($master) {
                $query->where('name', 'LIKE', "%{$master}%");
                $query->orWhere('email', 'LIKE', "%{$master}%");
                $query->orWhere('website', 'LIKE', "%{$master}%");
            }
            if ($link) {
                $query->whereIn('id', $link);
            }
            if ($email) {
                $query->whereIn('id', $email);
            }
            if ($status) {
                $query->whereIn('id', $status);
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
        return view('JobListingWebsite.list', compact('jobListing', 'joblist', 'link', 'email', 'status', 'master', 'index', 'searchplateform', 'searchemail', 'searchstatus', 'searchlink','ids'));
    }

    public function add(Request $request)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('JobListingWebsite.add');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request;
            $this->validate($request, [
                'name'  => 'required|alpha_num|max:100',
                'websiteLink' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            JobListingWebsite::addorUpdate($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('Job-listing-websites')->with(['success' => 'Job Listing Websites ' . $response . ' successfully']);
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
        $jobshow = JobListingWebsite::find($id);
        return view('JobListingWebsite.details', compact('jobshow'));
    }
    public function delete(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:job_listing_websites,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            JobListingWebsite::remove($request->id);
            return response()->json(['success' => 'JobListingWebsite deleted successfully.']);
        }
    }
    //export
    public function export(Request $request)
    {
        $ids =   explode(',', $request['id']);
        $data =  JobListingWebsite::withTrashed()->whereIn('id', $ids)->latest()->get()->toArray();
        //dd($data);
        foreach ($data as $value) {
            // $status =  Helper::status($value['status']);
            $arr[] = array(
                'name' => $value['name'],
                'websitelink' => $value['website'],
                'Email' => $value['email'],
                'Status' => $value['status'],
            );
        }
        return Excel::download(new JobListingWebsiteExport($arr), 'invoices.xlsx');
       
    }
}
