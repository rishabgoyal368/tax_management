@extends('Layout.app')
@section('title','View Supplier Data')
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
                            View Supplier Data
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">User Name
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ ucfirst(@$view_supplier_data->user->name) }}">
                            </div>
                            <div class="col-md-12 form-group">Invoice Date
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ date('d M Y', strtotime($view_supplier_data->invoice_date)) }}">
                            </div>
                            <div class="col-md-12 form-group">National Id Number
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_supplier_data->national_id_no }}">
                            </div>
                            <div class="col-md-12 form-group">Address
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_supplier_data->address }}">
                            </div>
                            <div class="col-md-12 form-group">Supplier Name
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ ucfirst(@$view_supplier_data->supplier_name) }}">
                            </div>
                            <div class="col-md-12 form-group">File Number
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_supplier_data->file_no }}">
                            </div>
                            <div class="col-md-12 form-group">Invoice Number
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_supplier_data->invoice_no }}">
                            </div>
                            <div class="col-md-12 form-group">Tax Registration Number
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_supplier_data->tax_registration_no }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection