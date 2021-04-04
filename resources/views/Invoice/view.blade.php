@extends('Layout.app')
@section('title','Update Invoice Detail')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" id="designationd" >
                @csrf
                <!-- <input type="hidden" name="id" id="id" value="{{@$invoice_detail->id}}"> -->
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            Invoice Detail
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">Final
                                <input type="text" name="Final" id="Final" class="form-control" autocomplete="off" placeholder="Final*" value="{{@$invoice_detail->Final}}" required>
                            </div>
                            <div class="col-md-12 form-group">Date To
                                <input type="date" name="date_to" id="date_to" class="form-control" autocomplete="off"  value="{{@$invoice_detail->date_to}}" required>
                            </div>
                            <div class="col-md-12 form-group">Date From
                                <input type="date" name="date_from" id="date_from" class="form-control" autocomplete="off" value="{{@$invoice_detail->date_from}}" required>
                            </div>
                            <div class="col-md-12 form-group">The Amount Of The Tax Payable
                                <input type="text" name="the_amount_of_the_tax_payable"  class="form-control" autocomplete="off" placeholder="The Amount Of The Tax Payable*" value="{{@$invoice_detail->the_amount_of_the_tax_payable}}" required>
                            </div>
                            <div class="col-md-12 form-group">Tax Previous Balance
                                <input type="text" name="tax_previous_balance" id="tax_previous_balance" class="form-control" autocomplete="off" placeholder="Tax Previous Balance*" value="{{@$invoice_detail->tax_previous_balance}}" required>
                            </div>
                            <div class="col-md-12 form-group">Tax Total Paid
                                <input type="text" name="tax_total_paid" id="tax_total_paid" class="form-control" autocomplete="off" placeholder="Tax Total Paid*" value="{{@$invoice_detail->tax_total_paid}}" required>
                            </div>
                            <div class="col-md-12 form-group">Tax Paid Share Each Per Partner
                                <input type="text" name="tax_paid_share_each_per_partner" id="tax_paid_share_each_per_partner" class="form-control" autocomplete="off" placeholder="Tax Paid Share Each Per Partner*" value="{{@$invoice_detail->tax_paid_share_each_per_partner}}" required>
                            </div>
                            <div class="col-md-12 form-group">Report Year
                                <input type="text" name="report_year" id="report_year" class="form-control" autocomplete="off" placeholder="Report Year*" value="{{@$invoice_detail->report_year}}" required>
                            </div>
                            <div class="col-md-12 form-group">Original
                                <input type="text" name="original" id="original" class="form-control" autocomplete="off" placeholder="Original*" value="{{@$invoice_detail->original}}" required>
                            </div>
                            <div class="col-md-12 form-group">Tax Period
                                <input type="text" name="tax_period" id="tax_period" class="form-control" autocomplete="off" placeholder="Tax Period*" value="{{@$invoice_detail->tax_period}}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row grow">
                    <div class="col-12">
                        <div class="submit-section text-center btn-add">
                            <input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
                            <a href="{{url('/invoice-list')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection