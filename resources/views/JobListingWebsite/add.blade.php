@extends('Layout.app')
@section('title','Add Job Listing Websites')
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
                    <div class="col-xl-12 col-lg-8 col-md-12">
                        <form method="POST" action="{{url('/Add-job-listing-websites')}}">
                            @csrf
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-header">
                                    <h4 class="card-title mb-0 d-inline-block">Add Job Listing Websites</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="name" id="" class="form-control" placeholder="Name of the platform*">
                                            @if ($errors->has('name'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="websiteLink" id="" class="form-control" placeholder="Website link*">
                                            @if ($errors->has('websiteLink'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('websiteLink') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="email" name="email" id="" class="form-control" placeholder="Registered Email address*">
                                            @if ($errors->has('email'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="password" name="password" id="" class="form-control" placeholder="Password*">
                                            @if ($errors->has('password'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group mb-0">
                                            <select class="form-control select" name="status" >
                                                <option value="" selected disabled>Status </option>
                                                <option value="1">Active</option>
                                                <option value="2">Deactivated</option>
                                                <option value="3">Deleted</option>
                                                <option value="3">Archive</option>
                                            </select>
                                            @if ($errors->has('password1'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('password1') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row grow">
                                <div class="col-12">
                                    <div class="submit-section text-center btn-add">
                                        <input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
                                        <a href="{{url('/Job-listing-websites')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection