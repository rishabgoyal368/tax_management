@extends('Layout.app')
@section('title','Forget Your Password')
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
                        <h1>{{ __('Forget Your Password') }}</h1>

                        <form id="loginform" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="Email">
                            </div>


                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block loaderSubmit" data-id="loginform" type="submit">Send Password Reset Link</button>
                            </div>
                        </form>
                        <div class="text-center forgotpass"><a href="{{url('/login')}}">Login</a></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
@endsection