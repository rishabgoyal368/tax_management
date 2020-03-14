@extends('Layout.app')
@section('title','login')
@section('content')
		<!-- Main Wrapper -->
		<div class="inner-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
					<div class="loginbox shadow-sm grow">
						<div class="login-left">
							<img class="img-fluid" src="assets/img/logo.png" alt="Logo">
						</div>
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form id="loginform" action="{{ route('login') }}" method="POST">
									@csrf
									<div class="form-group">
										<input class="form-control" name="email" id="email" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name="password" id="password" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								<script>
									
								</script>
								
								<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
@endsection