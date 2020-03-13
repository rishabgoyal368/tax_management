@extends('Layout.app')
@section('title','Home')
@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
                <aside class="sidebar sidebar-user">
                    <div class="row">
                        <div class="col-12">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-body py-4">
                                    <div class="row">
                                        <div class="col-md-12 mr-auto text-left">
                                            <div class="custom-search input-group">
                                                <div class="custom-breadcrumb">
                                                    <ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
                                                        <li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Home</a></li>
                                                        <li class="breadcrumb-item d-inline-block active">Dashboard</li>
                                                    </ol>
                                                    <h4 class="text-dark">Admin Dashboard</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-card card shadow-sm bg-white text-center ctm-border-radius grow">
                        <div class="user-info card-body">
                            <div class="user-avatar mb-4">
                                <img src="assets/img/profiles/img-13.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
                            </div>
                            <div class="user-details">
                                <h4><b>Welcome Admin</b></h4>
                                <p>Sun, 29 Nov 2019</p>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->
                    @include('Layout.sidebar')

                    <!-- /Sidebar -->

                </aside>
            </div>
            <div class="col-xl-9 col-lg-8  col-md-12">
                <div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
                    <div class="card-body">
                        <ul class="list-group list-group-horizontal-lg">
                            <li class="list-group-item text-center active button-5"><a href="index.html" class="text-white">Admin Dashboard</a></li>
                            <li class="list-group-item text-center button-6"><a class="text-dark" href="employees-dashboard.html">Employees Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="company-doc">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-header">
                                    <h4 class="card-title d-inline-block mb-0">
                                        Job Listing Websites
                                    </h4>
                                    <a href="{{url('/Add-job-listing-websites')}}" class="float-right add-doc text-primary">Add Job Listing Websites
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="employee-office-table">
                                        <div class="table-responsive">
                                            <table class="table custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>S.no</th>
                                                        <th>Platform name</th>
                                                        <th>Link to visit the platform</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Active leads</th>
                                                        <th>Actions</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($jobListing as $key => $job_list)
                                                    <tr>
                                                        <td>{{($jobListing->currentpage()-1) * $jobListing->perpage() + $key + 1}}</td>
                                                        <td>{{$job_list->name}}</td>
                                                        <td>{{$job_list->website}}</td>
                                                        <td>{{$job_list->email}}</td>
                                                        <td>{{$job_list->status}}</td>
                                                        <td>{{$job_list->name}}</td>
                                                        <td>{{$job_list->name}}</td>

                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        {{env('NO_RECORDS_FOUND','NO_RECORDS_FOUND')}}
                                                    </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection