@extends('Layout.app')
@section('title',@$label)
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
                            {{@$label}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Title*" value="{{@$department->name ?: old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email*" value="{{@$department->email ?: old('email') }}">
                                @if ($errors->has('email'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" name="number" id="phone_number" class="form-control" autocomplete="off" placeholder="Phone Numbe*" value="{{@$department->phone_number ?: old('phone_number') }}">
                                @if ($errors->has('phone_number'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Title*" value="{{@$department->password }}">
                                @if ($errors->has('password'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control " name="status">
                                    <option value="default"  disabled>Select Status</option>
                                    <option @if((@$department->status ) == 'Active') selected @endif selected value="Active">Active</option>
                                    <option @if((@$department->status ) == 'Deactivated') selected @endif value="Deactivated">Deactivated</option>
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