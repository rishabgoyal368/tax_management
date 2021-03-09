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
                            <div class="col-md-12 form-group">User Name -  {{ ucfirst(@$view_supplier_data->user->name) }}
                            </div>
                            <div class="col-md-12 form-group">Invoice Date - {{ date('d M Y', strtotime($view_supplier_data->invoice_date)) }}
                            </div>
                            <div class="col-md-12 form-group">National Id Number - {{ @$view_supplier_data->national_id_no }}
                            </div>
                            <div class="col-md-12 form-group">Address - {{ @$view_supplier_data->address }}
                            </div>
                            <div class="col-md-12 form-group">Supplier Name - {{ ucfirst(@$view_supplier_data->supplier_name) }}
                            </div>
                            <div class="col-md-12 form-group">File Number - {{ @$view_supplier_data->file_no }}
                            </div>
                            <div class="col-md-12 form-group">Invoice Number - {{ @$view_supplier_data->invoice_no }}
                            </div>
                            <div class="col-md-12 form-group">Tax Registration Number - {{ @$view_supplier_data->tax_registration_no }}
                            </div>
                        </div>
                        <center><a class="alert-action" data_id="{{ @$view_supplier_data->id }}"><i class="fa fa-exclamation-triangle" style="color: red; font-size: 42px;" aria-hidden="true"></i></a></center>
                    </div>
                    <input type="hidden" name="url_redirect" data_url="{{ url('/supplier-data/view/alert-send/'.@$view_supplier_data->id) }}" id="url_redirect">
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
