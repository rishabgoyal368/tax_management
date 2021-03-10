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
                    </div>
                </div>
            </form>

            <div class="bs-example">
                <!-- Button HTML (to Trigger Modal) -->
                <center><a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal"class="alert-action" data_id="{{ @$view_supplier_data->id }}">Send Message</a></center>
                    <!-- Modal HTML -->
                <div id="myModal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Your Message</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form id="my_message_form" method="post" action="{{ url('send-message-to-user') }}">
                                    <div class="form-group">
                                        <label for="inputComment">Message</label>
                                        <textarea class="form-control" id="inputComment" placeholder="Enter your Message..." rows="4" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ @$view_supplier_data->id }}">
                                    <input type="hidden" name="type" value="SupplierData">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

    </div>
</div>
@endsection
