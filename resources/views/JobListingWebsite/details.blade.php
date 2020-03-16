@extends('Layout.app')
@section('title','Job Listing Websites')
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
											<h4 class="card-title mb-0">Basic Information</h4>
										</div>

										<div class="card-body ">
											<p class="card-text mb-3"><span class="text-primary font-weight-bold">Plateform Name : </span><b>{{ $jobshow->name }}</b></p>
											<p class="card-text mb-3"><span class="text-primary font-weight-bold">Website Link : </span>{{ $jobshow->website }}</p>
											<p class="card-text mb-3"><span class="text-primary font-weight-bold">Email : </span> {{ $jobshow->email }} </p>
											<p class="card-text mb-3"><span class="text-primary font-weight-bold">Password 	 : </span><b>{{ $jobshow->password }}</b></p>
											<p class="card-text mb-3"><span class="text-primary font-weight-bold">Status : </span> {{ $jobshow->status }} </p>
											
											
										</div>
									</div>
								</div>
								
							</div>
						</div>
		
		
@endsection