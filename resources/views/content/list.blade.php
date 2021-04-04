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
                        <a href="{{url('/add-content')}}" class="float-right add-doc text-primary">Add Content</a><br>

                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Tax</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($content as $key => $value)
                                        <tr>

                                            <td>{{$key+1}}</td>
                                            <td>{{ $value->getTax() }}</td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/edit-content')}}/{{$value->id}}"> <span class="fa fa-pencil" data-toggle="tooltip" title="View"></span></a>
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection