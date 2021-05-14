@extends('Layout.app')
@section('title','View Salary 2 Tax')
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
                            View Salary 2 Tax
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">User Name -  {{ ucfirst(@$salary2_tax_details->user->name) }}
                            </div>
                            <?php
                                $base_url = asset('salary2_taxes/'); 
                            ?>

                            <div class="col-md-12 form-group">Upload Hiring List - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_hiring_list']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Upload Pay Slip - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_pay_slip']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Upload National Id -  <a href="{{ $base_url }}/{{$salary2_tax_details['upload_national_id']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Upload Insured - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_insured']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Upload Salaries List - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_salaries_list']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Upload Deductions - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_deductions']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>                            
                            <div class="col-md-12 form-group">Upload Benefits - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_benefits']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 form-group">Upload Resigning - <a href="{{ $base_url }}/{{$salary2_tax_details['upload_resigning']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
