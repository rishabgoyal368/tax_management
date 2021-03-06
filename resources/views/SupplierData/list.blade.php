@extends('Layout.app')
@section('title','Supplier Data List')
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
                        <h4 class="card-title d-inline-block mb-0">Supplier Data List</h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User Name</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($supplier_data_list as $key => $supplier_data)
                                        <tr>

                                            <td>{{$key+1}}</td>
                                            <td>{{ ucfirst($supplier_data['user']['name']) }}</td>
                                            <td>{{ date('d M Y',strtotime($supplier_data->invoice_date)) }}</td>
                                            <td>{{$supplier_data->invoice_no }}</td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/supplier-data/view')}}/{{$supplier_data->id}}"> <span class="fa fa-eye" data-toggle="tooltip" title="View"></span></a>
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
                    {{ $supplier_data_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection