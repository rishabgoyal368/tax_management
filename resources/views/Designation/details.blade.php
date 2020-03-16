@extends('Layout.app')
@section('title','Add Designation')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation" action="{{url('/add-designation')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$department->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            @if(@$department->id)
                            Edit Designation
                            @else
                            Add Designation
                            @endif
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="title" id="title" class="form-control commonCustomSelect" autocomplete="off" data-url="{{url('/get-department-title')}}" placeholder="Title*" value="{{@$department->title ?: old('name') }}">
                                <ul  class="recentSearchDrop" style="display:none" aria>
                                </ul>
                                @if ($errors->has('title'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="departmentId">
                                <input type="text" name="department" id="department" class="form-control designationGet" autocomplete="off" data-url="{{url('/get-department-ajax')}}" placeholder="Department*" value="{{@$department->getDepartment['title'] ?: old('websiteLink') }}">
                                <ul id="textboxSelect" class="recentSearchDrop" style="display:none" aria>
                                </ul>
                                @if ($errors->has('department'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control select" name="status">
                                    <option value="" selected disabled>Select Status</option>
                                    <option @if(@$department->status == '1') selected @endif value="1">Active</option>
                                    <option @if(@$department->status == '2') selected @endif value="2">Deactivated</option>
                                    <option @if(@$department->status == '3') selected @endif value="3">Deleted</option>
                                    <option @if(@$department->status == '4') selected @endif value="4">Archive</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
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
                            <a href="{{url('/designation')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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