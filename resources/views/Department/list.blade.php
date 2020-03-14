@extends('Layout.app')
@section('title','Designation')
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
                            Designation
                        </h4>
                        <a href="{{url('/add-designation')}}" class="float-right add-doc text-primary">Add Designation
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
                                            <th>Deparment</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($department as $key => $job_list)
                                        <tr>
                                            <td>{{($department->currentpage()-1) * $department->perpage() + $key + 1}}</td>
                                            <td>{{$job_list->title}}</td>
                                            <td>{{$job_list->getDepartment['title']}}</td>
                                            <td><a href="{{url('edit-designation')}}/{{$job_list->id}}">Edit</a></td>

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