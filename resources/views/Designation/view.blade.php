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
                    <p class="card-text mb-3"><span class="text-primary font-weight-bold">Name : </span><b>{{ $designation->title  }}</b></p>
                    <p class="card-text mb-3"><span class="text-primary font-weight-bold">Deparment : </span>{{ $designation->getDepartment['title'] }}</p>
                    <p class="card-text mb-3"><span class="text-primary font-weight-bold">Status : </span> {{status($designation->status)}} </p>


                </div>
            </div>
        </div>

    </div>
</div>


@endsection