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
                            <div class="col-md-12 form-group">User Name - {{ ucfirst(@$view_buy_invoice->user->name) }}
                            </div>
                            <div class="col-md-12 form-group">Product Code - {{ $view_buy_invoice->product_code }}
                            </div>
                            <div class="col-md-12 form-group">Product Name - {{ @$view_buy_invoice->product_name }}
                            </div>
                            <div class="col-md-12 form-group">Unites - {{ @$view_buy_invoice->unites }}
                            </div>
                            <div class="col-md-12 form-group">Unit Price Name - {{ ucfirst(@$view_buy_invoice->unit_price) }}
                            </div>
                            <div class="col-md-12 form-group">Total Line - {{ @$view_buy_invoice->total_line }}
                            </div>
                            <div class="col-md-12 form-group">Invoice Type - {{ @$view_buy_invoice->invoice_type }}
                            </div>
                            <div class="col-md-12 form-group">Product Type - {{ @$view_buy_invoice->product_type }}
                            </div>
                            <div class="col-md-12 form-group">Quantity - {{ @$view_buy_invoice->quantity }}
                            </div>
                            <div class="col-md-12 form-group">Tax Category - {{ @$view_buy_invoice->tax_category }}
                            </div>
                        </div>
                         <center><a class="alert-action" data_id="{{ @$view_buy_invoice->id }}"><i class="fa fa-exclamation-triangle" style="color: red; font-size: 42px;" aria-hidden="true"></i></a></center>
                    </div>
                    <input type="hidden" name="url_redirect" data_url="{{ url('/buy-invoice/view/alert-send/'.@$view_buy_invoice->id) }}" id="url_redirect">
                </div>
            </form>
        </div>

    </div>
</div>



@endsection