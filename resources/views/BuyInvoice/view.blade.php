@extends('Layout.app')
@section('title','View Buy Invoice')
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
                            View Buy Invoice
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">User Name
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ ucfirst(@$view_buy_invoice->user->name) }}">
                            </div>
                            <div class="col-md-12 form-group">Product Code
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ $view_buy_invoice->product_code }}">
                            </div>
                            <div class="col-md-12 form-group">Product Name
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->product_name }}">
                            </div>
                            <div class="col-md-12 form-group">Unites
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->unites }}">
                            </div>
                            <div class="col-md-12 form-group">Unit Price Name
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ ucfirst(@$view_buy_invoice->unit_price) }}">
                            </div>
                            <div class="col-md-12 form-group">Total Line
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->total_line }}">
                            </div>
                            <div class="col-md-12 form-group">Invoice Type
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->invoice_type }}">
                            </div>
                            <div class="col-md-12 form-group">Product Type
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->product_type }}">
                            </div>
                            <div class="col-md-12 form-group">Quantity
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->quantity }}">
                            </div>
                            <div class="col-md-12 form-group">Tax Category
                                <input type="text" name="name" id="name" disabled="disabled" class="form-control"  value="{{ @$view_buy_invoice->tax_category }}">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection