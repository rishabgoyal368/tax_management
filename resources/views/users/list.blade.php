@extends('Layout.app')
@section('title','Users')
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
                        <h4 class="card-title d-inline-block mb-0">Manage Users</h4>
                        <a href="{{url('/add-user')}}" class="float-right add-doc text-primary">Add User</a><br>
                        
                    </div>
                    <div class="card-body">
                        

                        <div class="employee-office-table"  >

                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $key => $user)
                                        <tr>

                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->email_verify}}</td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/edit-designation')}}/{{$user->id}}"> <span class="lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>
                                                    <a class="trash-icon common_delete" href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target=".common_delete_modal" data-url="{{url('/delete-designation')}}" data-back_url="{{url('/designation')}}" data-id="{{$user->id}}">
                                                        <span class="lnr lnr-trash" data-toggle="tooltip" title="Delete"></span>
                                                    </a>
                                                    <a class="eye_icon" href="{{url('/view-designation')}}/{{$user->id}}" target="_blank"> <i class="fa fa-fw fa-eye" data-toggle="tooltip" title="View"></i></a>
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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection