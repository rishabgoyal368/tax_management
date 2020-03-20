@extends('Layout.app')
@section('title','Edit Job Listing Websites')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="joblist" action="{{url('/Add-job-listing-websites')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$jobadd->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                        @if(@$jobadd->id)
                             Edit Job Listing Websites
                         @else
                            Add JOb Listing Website
                        @endif
                            </h4>
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
                                <input type="text" name="websiteLink" id="websiteLink" class="form-control" placeholder="Website link*" value="{{@$jobadd->website ?: old('websiteLink') }}">
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
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()">
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control" name="status">                                   
                                    <option value="" selected disabled>Select Status</option>
                                    <option @if(@$jobadd->status == 'Active') selected @endif value="Active">Active</option>
                                    <option @if(@$jobadd->status == 'Deactivated') selected @endif value="Deactivated">Deactivated</option>
                                    <option @if(@$jobadd->status == 'Deleted') selected @endif value="Deleted">Deleted</option>
                                    <option @if(@$jobadd->status == 'Archive') selected @endif value="Archive">Archive</option>
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

@endsection