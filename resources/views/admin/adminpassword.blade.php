@extends('Layout.app')
@section('title','AdminPassword')
@section('content')


<!-- Sidebar -->
@include('Layout.sidebar')

<!-- /Sidebar -->
<!-- Content -->

<div class="col-xl-9 col-lg-8  col-md-12">

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 d-flex">
            <div class="card flex-fill ctm-border-radius shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0">Admin Password</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="{{url('/updatepassword')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" class="form-control" value="{{ @Auth::user()->id }}">
                            <div class="col-md-12 form-group">
                                <input type="text" name="password" id="last_name" class="form-control" value="{{ @Auth::user()->password }}">
                                @if ($errors->has('first_name'))
                                <span class="siteLogo_error" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <button class="btn btn-info" type="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection