@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
	<div class="row">
		<div class="col-xl-12 col-lg-8 col-md-12">
			<form method="POST"  id="designation" action="{{url('/app-setting')}}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="id" id="id" value="{{ @$AppSetting['id'] }}">
				<div class="card ctm-border-radius shadow-sm grow">
					<div class="card-header">
						<h4 class="card-title mb-0 d-inline-block"> App setting </h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 form-group">
								<input type="number" required name="app_version" id="app_version" class="form-control" value="{{ @$AppSetting['app_version'] }}" autocomplete="off" placeholder="app_version*" >
								@if ($errors->has('app_version'))
								<span class="text-error" role="alert">
									<strong>{{ $errors->first('app_version') }}</strong>
								</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="file" name="logo" id="logo" class="form-control" autocomplete="off" >
								@if ($errors->has('logo'))
								<span class="siteLogo_error" role="alert">
									<strong>{{ $errors->first('logo') }}</strong>
								</span>
								@endif
                                @if(@$AppSetting['logo'])
                                <a href="{{$AppSetting->logo}}" target="_blank">{{$AppSetting->logo}}</a>
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