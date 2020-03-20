@extends('Layout.app')
@section('title','AdminProfile')
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
											<h4 class="card-title mb-0">Admin Profile</h4>
										</div>
										<div class="card-body">
					                        <div class="row">
					                        	<form  action="{{url('/updateprofile')}}" method="post">
					                        		@csrf
					                        		<input type="text" name="id" id="id" class="form-control" value="{{ @Auth::user()->id }}">
						                            <div class="col-md-12 form-group">
						                                <input type="text" name="first_name" id="last_name" class="form-control" value="{{ @Auth::user()->first_name }}">
						                                @if ($errors->has('first_name'))
						                                <span class="siteLogo_error" role="alert">
						                                    <strong>{{ $errors->first('first_name') }}</strong>
						                                </span>
						                                @endif
						                            </div>
						                            
						                            <div class="col-md-12 form-group">
						                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ @Auth::user()->last_name }}">
						                                @if ($errors->has('last_name'))
						                                <span class="siteLogo_error" role="alert">
						                                    <strong>{{ $errors->first('last_name') }}</strong>
						                                </span>
						                                @endif
						                            </div>
						                            
						                            <div class="col-md-12 form-group">
						                                <input type="text" name="email" id="email" class="form-control" value="{{ @Auth::user()->email }}">
						                                @if ($errors->has('email'))
						                                <span class="siteLogo_error" role="alert">
						                                    <strong>{{ $errors->first('email') }}</strong>
						                                </span>
						                                @endif
						                            </div>

						                            <input type="file" name="image" id="image">
						                            @if ($errors->has('image'))
						                                <span class="siteLogo_error" role="alert">
						                                    <strong>{{ $errors->first('image') }}</strong>
						                                </span>
						                                @endif
						                            <button class="btn btn-info" type="submit" >Edit</button>
												</form>
					                        </div>
                    					</div>
									</div>
								</div>								
							</div>
						</div>
		
		
@endsection