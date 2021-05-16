@extends('Layout.app')
@section('title','Add Deduct Tax List')
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
                        <h4 class="card-title d-inline-block mb-0">Add Deduct Tax List</h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User Name</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($add_deduct_Tax_list as $key => $add_deduct_Tax)
                                        <tr>

                                            <td>{{$key+1}}</td>
                                            <td>{{ ucfirst($add_deduct_Tax['user']['name']) }}</td>
                                            <td><a href="{{ url('/add-deduct-tax-list/view/'.$add_deduct_Tax['id'])}}"><i class="fa fa-eye"></i></a></td>
                                            
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
                    {{ $add_deduct_Tax_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection