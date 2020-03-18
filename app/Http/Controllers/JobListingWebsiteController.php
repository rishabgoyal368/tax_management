<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\JobListingWebsite;


class JobListingWebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show(Request $request)
    {
        // return $request;
            $master = $request->master;
            $link = $request->webplateform;
            $email = $request->webemail;
            $status = $request->webstatus;
            $index = $request->index;
            $searchplateform = $request->PlateformName;
            $searchemail = $request->Emailname;
            $searchstatus = $request->Statusname;
            $searchlink = $request->LinkName;
            // return $plateform;
            // $jobsort =  $request->sr;
            $joblist = JobListingWebsite::withTrashed()->get();
            $result = JobListingWebsite::withTrashed()->where(function ($query) use ($master,$link,$email,$status) {
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
            if($index)
            {
                $result->orderBy('id',$index);
            }
            if($searchplateform)
            {
                $result->orderBy('id',$searchplateform);
            }
            if($searchemail)
            {
                $result->orderBy('id',$searchemail);
            }
            if($searchstatus)
            {
                $result->orderBy('id',$searchstatus);
            }
            if($searchlink)
            {
                $result->orderBy('id',$searchlink);
            }
            $jobListing = $result->paginate(10);
            return view('JobListingWebsite.list', compact('jobListing','joblist','link','email','status','master','index','searchplateform','searchemail','searchstatus','searchlink'));
    }

    public function add(Request $request)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('JobListingWebsite.add');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request;
            $this->validate($request, [
                'name'  => 'required|alpha|max:100',
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
        //return $data;
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
}
