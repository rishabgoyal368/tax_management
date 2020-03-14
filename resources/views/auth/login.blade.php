@extends('Layout.app')
@section('title','login')
@section('content')
<!-- Main Wrapper -->
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox shadow-sm grow">
                <div class="login-left">
                    <img class="img-fluid" src="{{asset('assets/img/logo.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form id="loginform" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Password">
                            </div>
                            <div class="form-group row">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block loaderSubmit" data-id="loginform" type="submit">Login</button>
                            </div>
                        </form>
                        <script>

                        </script>

                        <div class="text-center forgotpass"><a href="{{url('/password/reset')}}">Forgot Password?</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection