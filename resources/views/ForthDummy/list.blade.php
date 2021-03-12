@extends('Layout.app')
@section('title','Forth Dummy List')
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
                        <h4 class="card-title d-inline-block mb-0">Forth Dummy List</h4>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($forth_dummy as $key => $forth_data)
                                        <tr>

                                            <td>{{$key+1}}</td>
                                            <td>{{ ucfirst($forth_data['user']['name']) }}</td>
                                            <td>{{ ucfirst($forth_data->file) }}</td>
                                            <td>
                                                <div class="action_block">
                                                   <a class="edit_icon"> <i class="fa fa-bell-o" aria-hidden="true"></i></a>
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
                    {{ $forth_dummy->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection