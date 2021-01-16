@extends('Layout.app')
@section('title','Home')
@section('content')

<!-- Content -->
@include('Layout.sidebar')

<div class="col-xl-9 col-lg-8  col-md-12">
	<!-- Widget -->
	<div class="row">
		<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="card dash-widget ctm-border-radius shadow-sm grow">
				<div class="card-body">
					<div class="card-icon bg-primary">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div>
					<div class="card-right">
						<h4 class="card-title">Users</h4>
						<p class="card-text">700</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / Widget -->
</div>
</div>
</div>
</div>
<!--/Content-->
@endsection