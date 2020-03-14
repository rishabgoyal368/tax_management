<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobListingWebsite;


class DesignationsController extends Controller
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
            return redirect()->back()->with(['success' => 'Job Listing Websites added successfully']);
        }
    }
}
