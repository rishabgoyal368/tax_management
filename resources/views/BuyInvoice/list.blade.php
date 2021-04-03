@extends('Layout.app')
@section('title','Buy Invoice List')
@section('content')
<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->
<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-md-12">
            <div class="company-doc">
                <div class="card ctm-border-radius shadow-sm grow">
                <div class="card-header">
                        <h4 class="card-title d-inline-block mb-0">Buy Invoice List</h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User Name</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($buy_invoice_list as $key => $buy_invoice)
                                        <tr>

                                            <td>{{$key+1}}</td>
                                            <td>{{ ucfirst($buy_invoice['user']['name']) }}</td>
                                            <td>{{ ucfirst($buy_invoice->product_code) }}</td>
                                            <td>{{ ucfirst($buy_invoice->product_name) }}</td>
                                            <td>{{ $buy_invoice->unit_price }}</td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/buy-invoice/view')}}/{{$buy_invoice->id}}"> <span class="fa fa-eye" data-toggle="tooltip" title="View"></span></a>
                                                </div>
                                            </td>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>{{env('NO_RECORDS_FOUND')}}</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $buy_invoice_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection