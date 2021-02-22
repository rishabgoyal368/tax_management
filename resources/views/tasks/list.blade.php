@extends('Layout.app')
@section('title','Tasks')
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
                        <h4 class="card-title d-inline-block mb-0">Manage Tasks</h4>
                        <a href="{{url('/add-task')}}" class="float-right add-doc text-primary">Add Task</a><br>                        
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Alocated To</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tasks as $key => $user)
                                        <tr>

                                            <td>{{$user->id}}</td>
                                            <td>{{$user->task_name}}</td>
                                            <td><a href="{{url('edit-user')}}/{{$user->getAlocateUser()['id']}}" target="_blank"> {{$user->getAlocateUser()['name']}}</a></td>
                                            <td>{{$user->status}}</td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/edit-task')}}/{{$user->id}}"> <span class="lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>
                                                    <a class="trash-icon common_delete" href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target=".common_delete_modal" data-url="{{url('/delete-task')}}"  data-id="{{$user->id}}">
                                                        <span class="lnr lnr-trash" data-toggle="tooltip" title="Delete"></span>
                                                    </a>
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
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection