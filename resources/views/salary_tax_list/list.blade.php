@extends('Layout.app')
@section('title','Salary Tax List')
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
                        <h4 class="card-title d-inline-block mb-0">Salary Tax List</h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>User Name</th>
                                            <th>View</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($salary_tax_list as $key => $salary_tax)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ ucfirst($salary_tax['user']['name']) }} -({{ ucfirst($salary_tax['user']['email']) }})</td>
                                            <td><a href="{{ url('/salary-tax-list/view/'.$salary_tax['id'])}}"><i class="fa fa-eye"></i></a></td>
                                            <!-- <td>
                                                <div class="action_block">
                                                    <a  style="cursor: pointer;" class="btn btn-lg btn-primary notify_model" data_list_id="{{ $salary_tax['id'] }}" data_user_id="{{ $salary_tax['user']['id']}}"> <i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                                </div>
                                            </td> -->
                                        </tr>
                                        <div class="bs-example">
                                                <!-- Modal HTML -->
                                            <div id="myModal" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Your Message</h5>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="my_message_form" method="post" action="{{ url('send-message-to-user') }}">
                                                                <div class="form-group">
                                                                    <label for="inputComment">Message</label>
                                                                    <textarea class="form-control" id="inputComment" name="message" placeholder="Enter your Message..." rows="4" required></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                                </div>
                                                                <input type="hidden" name="id" id="list_id" value="">
                                                                <input type="hidden" name="user_id" id="userId" value="">
                                                                <input type="hidden" name="type" value="salary_tax">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
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
                    {{ $salary_tax_list->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection