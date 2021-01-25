@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-xl-12 col-lg-8 col-md-12">
			<form method="POST" name="joblist" id="designation" action="{{url('/updatepassword')}}">
				@csrf
				<input type="hidden" name="id" id="id" value="{{ @Auth::user()->id }}">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0 d-inline-block"> Admin Profile </h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 form-group">
								<input type="password" name="current_password" id="current_password" class="form-control" autocomplete="off" placeholder="Current Password*" >
								@if ($errors->has('current_password'))
								<span class="text-error" role="alert">
									<strong>{{ $errors->first('current_password') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="password" name="new_password" id="new_password" class="form-control" autocomplete="off" placeholder="New Password*">
								@if ($errors->has('new_password'))
								<span class="siteLogo_error" role="alert">
									<strong>{{ $errors->first('new_password') }}</strong>
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
							<a href="{{url('/')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>



@endsection