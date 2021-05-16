@extends('Layout.app')
@section('title','View Salary Tax')
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
                        View Salary Tax
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 form-group">User Name - {{ ucfirst(@$salary_tax_detail->user->name) }}
                        </div>
                        <?php
                            $base_url = asset('salary_tax_add/'); 
                        ?>
                        <div class="col-md-12 form-group">Upload Photo Of Tax - <a href="{{ $base_url }}/{{$salary_tax_detail['upload_photo_of_tax']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Company Contract - <a href="{{ $base_url }}/{{$salary_tax_detail['company_contract']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">National Id - <a href="{{ $base_url }}/{{$salary_tax_detail['national_id']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Financial Budget - <a href="{{ $base_url }}/{{$salary_tax_detail['financial_budget']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Import  Export Certificates - <a href="{{ $base_url }}/{{$salary_tax_detail['import_export_certificates']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Other Docs - <a href="{{ $base_url }}/{{$salary_tax_detail['other_docs']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Commercial Certificate - <a href="{{ $base_url }}/{{$salary_tax_detail['commercial_certificate']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Additional Tax - <a href="{{ $base_url }}/{{$salary_tax_detail['additional_tax']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Office Lease Contract - <a href="{{ $base_url }}/{{$salary_tax_detail['office_lease_contract']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Social Insurance - <a href="{{ $base_url }}/{{$salary_tax_detail['social_insurance']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Construction Certificate - <a href="{{ $base_url }}/{{$salary_tax_detail['construction_certificate']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-md-12 form-group">Industrial Certificate - <a href="{{ $base_url }}/{{$salary_tax_detail['industrial_certificate']}}">Check Document <i class="fa fa-eye"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection