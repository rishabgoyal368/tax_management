<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('JobListingWebsite.list',compact('jobListing'));
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
            return redirect('Job-listing-websites')->with(['success' => 'Job Listing Websites added successfully']);
        }
    }
    public function edit(Request $request, $id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $jobadd = JobListingWebsite::find($id);
            return view('JobListingWebsite.add',compact('jobadd'));
        }
    }
}
