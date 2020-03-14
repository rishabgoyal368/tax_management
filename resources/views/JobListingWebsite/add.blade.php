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
                <div class="row">
                    <div class="col-xl-12 col-lg-8 col-md-12">
                        <form method="POST" name="joblist" id="joblist" action="{{url('/Add-job-listing-websites')}}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{@$jobadd->id ?: old('id') }}">
                            <div class="card ctm-border-radius shadow-sm grow">
                                <div class="card-header">
                                    <h4 class="card-title mb-0 d-inline-block">Add Job Listing Websites</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name of the platform*" value="{{@$jobadd->name ?: old('name') }}">
                                            @if ($errors->has('name'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="websiteLink" id="websiteLink" class="form-control" placeholder="Website link*"value="{{@$jobadd->website ?: old('websiteLink') }}">
                                            @if ($errors->has('websiteLink'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('websiteLink') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Registered Email address*" value="{{@$jobadd->email ?: old('email') }}">
                                            @if ($errors->has('email'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password*" value="{{@$jobadd->password ?: old('password')}}">
                                            @if ($errors->has('password'))
                                            <span class="siteLogo_error" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                            <input type="checkbox" onclick="myFunction()">Show Password
                                        </div>
                                        <div class="col-md-12 form-group mb-0">
                                            <select class="form-control select" name="status"  >
                                                @if(@$jobadd->status == 1)
                                                <option value=""selected disabled>
                                                active</option>
                                                @endif
                                                @if(@$jobadd->status == 2)
                                                <option value=""selected disabled>
                                                deactive</option>
                                                @endif
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