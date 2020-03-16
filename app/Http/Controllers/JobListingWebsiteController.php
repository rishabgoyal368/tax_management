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

    public function show()
    {
        $jobListing = JobListingWebsite::paginate(10);
        return view('JobListingWebsite.list', compact('jobListing'));
    }

    public function add(Request $request)
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('JobListingWebsite.add');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validate($request, [
                'name'  => 'required|alpha|max:100',
                'websiteLink' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            JobListingWebsite::add($request);
            $response = @$request->id ? 'updated' : 'added';
            return redirect('Job-listing-websites')->with(['success' => 'Job Listing Websites ' . $response . ' successfully']);
        }
    }

    public function edit(Request $request, $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $jobadd = JobListingWebsite::find($id);
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
