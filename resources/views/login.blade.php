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
								<!-- http://dreamguys.co.in/demo/dleohr/dleohr-vertical/index.html -->
								<form id="loginform" method="POST">
									<div class="form-group">
										<input class="form-control" name="email" id="email" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name="password" id="password"type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								<script>
									$("#loginform").validate
						              ({      
						                rules: {
						                   email: {
						                        required: true,
						                        email:true
						                    },
						                    password: {
						                            required: true



						                    }, 
						                },
						             });
								</script>
								
								<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Passworddd?</a></div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
@endsection