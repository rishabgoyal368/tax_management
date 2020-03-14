@extends('Layout.app')
@section('title','Deparment')
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
                        <h4 class="card-title d-inline-block mb-0">
                            Deparment
                        </h4>
                        <a href="{{url('/Add-deparment')}}" class="float-right add-doc text-primary">Add Deparment
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>name</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($department as $key => $job_list)
                                        <tr>
                                            <td>{{($department->currentpage()-1) * $department->perpage() + $key + 1}}</td>
                                            <td>{{$job_list->name}}</td>
                                            <td>{{$job_list->website}}</td>
                                            <td>{{$job_list->email}}</td>
                                            <td>{{$job_list->status}}</td>
                                            <td>{{$job_list->name}}</td>
                                            <td>{{$job_list->name}}</td>

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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection