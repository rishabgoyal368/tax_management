<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Linearicon Font -->
    <link rel="stylesheet" href="{{asset('assets/css/lnr-icon.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--validator css-->
    <link rel="stylesheet" href="{{asset('assets/css/validate.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>@yield('title')</title>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>


    <div class="inner-wrapper">
        <!-- Loader -->
        <div id="loader-wrapper">

            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
        @if(Request::segment(1) != 'login' && Request::segment(1) != 'password' )
        @include('Layout.header')
        @endif
        @yield('content')

        @extends('Layout.footer')
    </div>
</body>

</html>