@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-xl-12 col-lg-8 col-md-12">
			<form method="POST" name="joblist" id="designation" action="{{url('/updateprofile')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" id="id" value="{{ @Auth::user()->id }}">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0 d-inline-block"> Admin Profile </h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 form-group">
								<input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Title*" value="{{ @Auth::user()->name }}">
								@if ($errors->has('name'))
								<span class="text-error" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="email" name="email" id="email" class="form-control" autocomplete="off" placeholder="Email*" value="{{ @Auth::user()->email }}">
								@if ($errors->has('email'))
								<span class="siteLogo_error" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="number" name="phone_number" id="phone_number" min="0" maxlength="12" minlength="10" class="form-control" value="{{ @Auth::user()->phone_number }}">
								@if ($errors->has('phone_number'))
								<span class="siteLogo_error" role="alert">
									<strong>{{ $errors->first('phone_number') }}</strong>
								</span>
								@endif
							</div>

							<input type="file" name="image" id="image" class="form-control">
							@isset(Auth::user()->profile_pic)
							<a href="{{env('APP_URL').'uploads/'.Auth::user()->profile_pic}}" target="_blank">{{Auth::user()->profile_pic}}</a>
							@endisset
							@if ($errors->has('image'))
							<span class="siteLogo_error" role="alert">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif

						</div>
					</div>
				</div>
				<div class="row grow">
					<div class="col-12">
						<div class="submit-section text-center btn-add">
							<input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
							<a href="{{url('/')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>



@endsection