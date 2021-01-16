@extends('Layout.app')
@section('title','Reset Password')
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

                        <h1>{{ __('Reset Password') }}</h1>
                        <form id="resetform" action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="form-group">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="text" placeholder="Email" value="{{old('email')}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Reset Password Confirmation</button>
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