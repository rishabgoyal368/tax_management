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
                        <h4 class="card-title d-inline-block mb-0">Designation</h4>
                        <a href="{{url('/add-designation')}}" class="float-right add-doc text-primary">Add Designation</a><br>
                        <a class="float-right add-doc text-primary" id='importData' data-toggle="modal" data-target="#addNewTeam" data-model_name='Import Data in Designation' data-url="{{url('/import')}}" data-type="1">Import</a><br>
                        <a href="{{url('/export-designation')}}" onclick="event.preventDefault();document.getElementById('document-export').submit();" class="float-right add-doc text-primary">Export</a><br>
                        <form action="{{url('export-designation')}}" method="post" id="document-export" style='display:none'>
                            @csrf
                            <input type="hidden" name="id" value="{{$ids}}">
                        </form>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('/designation')}}">
                            @csrf
                            <div class="row">
                                <div class="col-1 pt-3">
                                    <label><b>Search:</b></label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="master" value="{{@$master }}" class="form-control" placeholder="Enter keywords" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <select class="selectpicker" multiple data-live-search="true" name="department[]" data-style="form-control btn-default btn-outline">
                                            <option disabled>select Department</option>
                                            @foreach($Designation as $value)
                                            <option value="{{$value->getDepartment['id']}}" @if(!empty($department)) @if(in_array($value->getDepartment['id'],$department)) selected @endif @endif>{{$value->getDepartment['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">

                                        <select class="selectpicker" multiple data-live-search="true" id="statusSelect" name="status[]" data-style="form-control btn-default btn-outline">
                                            <option disabled>select Status</option>
                                            @foreach($Designation->unique('status') as $value)
                                            <option value="{{$value->status}}" @if(!empty($status)) @if(in_array($value->status,$status)) selected @endif @endif>{{$value->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row pb-5 border-bottom mb-5">
                                <div class="col-1"></div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info mr-10" id="designation_submit"> Search</button>
                                        <a class="btn btn-danger" href="{{url('/designation')}}"> Reset</a>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" value='{{@$index}}' name="" id='indexSort'>
                            <input type="hidden" value='{{@$index}}' name="" id='titleSort'>
                            <input type="hidden" value='{{@$index}}' name="" id='departmentSort'>
                            <input type="hidden" value='{{@$index}}' name="" id='statusSort'>

                        </form>
                        <p>Showing {{$GetDesignation->firstItem()}} - {{$GetDesignation->lastItem()}} of {{@$GetDesignation->total()}}</p>

                        <div class="employee-office-table">

                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='indexSort' data-id='indexSort' data-submit='designation_submit'></i>S.no<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='indexSort' data-id='indexSort' data-submit='designation_submit'></i></th>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='titleSort' data-id='titleSort' data-submit='designation_submit'></i>Designation<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='titleSort' data-id='titleSort' data-submit='designation_submit'></i></th>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='departmentSort' data-id='departmentSort' data-submit='designation_submit'></i>Deparment<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='departmentSort' data-id='departmentSort' data-submit='designation_submit'></i></th>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='statusSort' data-id='statusSort' data-submit='designation_submit'></i>Status<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='statusSort' data-id='statusSort' data-submit='designation_submit'></i></th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($GetDesignation as $key => $department)
                                        <tr>

                                            <td>{{($GetDesignation->currentpage()-1) * $GetDesignation->perpage() + $key + 1}}</td>
                                            <td>{{$department->title}}</td>
                                            <td>{{$department->getDepartment['title']}}</td>
                                            <td> <label class="{{Helper::statusClass($department->status)}}">{{($department->status)}}</label></td>
                                            <td>
                                                <div class="action_block">
                                                    <a class="edit_icon" href="{{url('/edit-designation')}}/{{$department->id}}"> <span class="lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>
                                                    <a class="trash-icon common_delete" href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target=".common_delete_modal" data-url="{{url('/delete-designation')}}" data-back_url="{{url('/designation')}}" data-id="{{$department->id}}">
                                                        <span class="lnr lnr-trash" data-toggle="tooltip" title="Delete"></span>
                                                    </a>
                                                    <a class="eye_icon" href="{{url('/view-designation')}}/{{$department->id}}" target="_blank"> <i class="fa fa-fw fa-eye" data-toggle="tooltip" title="View"></i></a>
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
                    {{$GetDesignation->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


@endsection