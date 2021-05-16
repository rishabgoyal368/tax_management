@extends('Layout.app')
@section('title','View Add Deduct Tax')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <div class="card ctm-border-radius shadow-sm grow">
                <div class="card-header">
                    <h4 class="card-title mb-0 d-inline-block">
                       View Add Deduct Tax
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">User Name - {{ ucfirst(@$add_deduct_Tax__details->user->name) }}
                        </div>
                        <?php
                            $base_url = asset('add_deduct_taxes/'); 
                        ?>

       
                        <div class="col-md-12 form-group">Buy Invoice - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['buy_invoice']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Deduct Notice Paper - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['deduct_notice_paper']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Other Docs - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['other_docs']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Manufacturers - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['manufacturers']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Payment Agreement - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['payment_agreement']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Form No 41 - <a href="{{ $base_url }}/{{$add_deduct_Tax__details['form_no_41']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection