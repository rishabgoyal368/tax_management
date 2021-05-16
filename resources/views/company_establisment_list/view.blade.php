@extends('Layout.app')
@section('title','View Company Establisment')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$task->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            View Company Establisment
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">User Name -  {{ ucfirst(@$company_establisment_details->user->name) }}
                            </div>
                            <?php
                                $base_url = asset('company_establishment_add/'); 
                            ?>
   
                            <div class="col-md-12 form-group">Stock Partnership - <a href="{{ $base_url }}/{{$company_establisment_details['stock_partnership']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Partnerships  Co - <a href="{{ $base_url }}/{{$company_establisment_details['partnerships_co']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">One Person Co  - <a href="{{ $base_url }}/{{$company_establisment_details['one_person_co']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Manufacturers - <a href="{{ $base_url }}/{{$company_establisment_details['manufacturers']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Adjust - <a href="{{ $base_url }}/{{$company_establisment_details['adjust']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Joint Stock Companies -  <a href="{{ $base_url }}/{{$company_establisment_details['joint_stock_companies']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Limited Liability - <a href="{{ $base_url }}/{{$company_establisment_details['limited_liability']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Sole Company - <a href="{{ $base_url }}/{{$company_establisment_details['sole_company']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Branches - <a href="{{ $base_url }}/{{$company_establisment_details['branches']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Separation Of Exit - <a href="{{ $base_url }}/{{$company_establisment_details['separation_of_exit']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection
