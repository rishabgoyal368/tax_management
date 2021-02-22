@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation" action="{{url('/add-user')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$user->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            {{@$label}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Title*" value="{{@$user->name ?: old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email*" value="{{@$user->email ?: old('email') }}">
                                @if ($errors->has('email'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="number" name="phone_number" id="phone_number" class="form-control" autocomplete="off" placeholder="Phone Number*" value="{{@$user->phone_number ?: old('phone_number') }}">
                                @if ($errors->has('phone_number'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            @if(!$user['id'])
                            <div class="col-md-12 form-group">
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off" placeholder="Password*" value="{{@$user->password }}">
                                @if ($errors->has('password'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="off" placeholder="Confirm Password*" value="{{@$user->password }}">
                                @if ($errors->has('password_confirmation'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            @endif

                            <div class="col-md-12 form-group">
                                <input type="text" name="job" id="job" class="form-control" autocomplete="off" placeholder="Job*" value="{{@$user->job ?: old('job') }}">
                                @if ($errors->has('job'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('job') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control " name="status">
                                    <option value="default"  disabled>Select Status</option>
                                    <option @if((@$user->status ) == 'Active') selected @endif selected value="Active">Active</option>
                                    <option @if((@$user->status ) == 'Deactivated') selected @endif value="Deactivated">Deactivated</option>
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
                            <a href="{{url('/manage-user')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection