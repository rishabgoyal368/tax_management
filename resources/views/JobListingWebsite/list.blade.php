@extends('Layout.app')
@section('title','Job Listing Websites')
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
                            Job Listing Websites
                        </h4>
                        <a href="{{url('/Add-job-listing-websites')}}" class="float-right add-doc text-primary">Add Job Listing Websites</a><br>

                        <a class="float-right add-doc text-primary" id='importData' data-toggle="modal" data-target="#addNewTeam" data-backdrop="static" data-model_name='Import Data in Job listing website' data-url="{{url('/import')}}" data-back_url="{{url('/Job-listing-websites')}}" data-type="2">Import</a><br>

                        <a href="{{url('/export-joblisting')}}" onclick="event.preventDefault();document.getElementById('documents-export').submit();" class="float-right add-doc text-primary">Export</a>

                        <!--view password-->

                        <span class="showPasswordModal" data-url="{{url('/reauthenticate')}}" data-back_url="{{url('/Job-listing-websites')}}" data-backdrop="static" data-toggle="modal" data-target="#password">
                            <a href="javascript:void(0)" class="btn btn-theme text-white ctm-border-radius"><i class="eye_icon fa fa-fw fa-eye fa-2x"></i></a>
                        </span>

                        <form action="{{url('export-joblisting')}}" method="post" id="documents-export">
                            @csrf
                            <input type="hidden" name="id" value="{{$ids}}">
                        </form>

                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('/Job-listing-websites')}}">
                            @csrf
                            <div class="row">
                                <div class="col-1 pt-3">
                                    <label><b>Search:</b></label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="master" value="{{ @$master }}" class="form-control" placeholder="Document" autocomplete="off">
                                        <input type="hidden" value="">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <select class="selectpicker" multiple data-live-search="true" name="webplateform[]" data-style="form-control btn-default btn-outline">
                                            <option disabled>Select Plateform</option>
                                            @foreach($joblist->unique('name') as $value2)
                                            <option value="{{$value2->name}}" @if(!empty($plateform)) @if(in_array($value2->name,$plateform)) selected @endif @endif>{{$value2->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <select class="selectpicker" multiple data-live-search="true" id="emailSelect" name="webemail[]" data-style="form-control btn-default btn-outline">
                                            <option disabled>Select Email</option>
                                            @foreach($joblist->unique('email') as $value3)
                                            <option value="{{$value3->email }}" @if(!empty($email)) @if(in_array($value3->email,$email)) selected @endif @endif>{{$value3->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-5 border-bottom mb-5">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="selectpicker" multiple data-live-search="true" id="statusSelect" name="webstatus[]" data-style="form-control btn-default btn-outline">
                                            <option disabled>Select Status</option>
                                            @foreach($joblist->unique('status') as $value)
                                            <option value="{{$value->status}}" @if(!empty($status)) @if(in_array($value->status,$status)) selected @endif @endif>{{$value->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info mr-10" id='job_list_submit'> Search </button>
                                    <a class="btn btn-danger" href="{{url('/Job-listing-websites')}}"> Reset</a>
                                </div>
                            </div>
                            <input type="hidden" value='{{@$index}}' name="" id='index'>
                            <input type="hidden" value='{{@$searchplateform}}' name="" id='PlateformName'>
                            <input type="hidden" value='{{@$searchemail}}' name="" id='Emailname' id="Emailname">
                            <input type="hidden" value='{{@$searchstatus}}' name="" id='Statusname'><input type="hidden" value='{{@$searchlink}}' name="" id='LinkName'>

                        </form>
                        <p>Showing {{$jobListing->firstItem()}} - {{$jobListing->lastItem()}} of {{@$jobListing->total()}}</p>
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='index' data-id='index' data-submit='job_list_submit'></i>S.no<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='index' data-id='index' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='PlateformName' data-id='PlateformName' data-submit='job_list_submit'></i>Platform name<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='PlateformName' data-id='PlateformName' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='LinkName' data-id='LinkName' data-submit='job_list_submit'></i>Link to visit the platform<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='LinkName' data-id='LinkName' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='Emailname' data-id='Emailname' data-submit='job_list_submit'></i>Email<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='Emailname' data-id='Emailname' data-submit='job_list_submit'></i></th>
                                            <th class="hidepassword" style="display:none;">password</th>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='Statusname' data-id='Statusname' data-submit='job_list_submit'></i>Status<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='Statusname' data-id='Statusname' data-submit='job_list_submit'></i></th>
                                            <th>Active leads</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobListing as $key => $job_list)
                                        <tr>
                                            <td>{{$job_list->id}}</td>
                                            <td>{{$job_list->name}}</td>
                                            <td><a href="{{$job_list->website}}" target="_blank">{{$job_list->website}}</a></td>
                                            <td>{{$job_list->email}}</td>
                                            <td class="hidepassword" style="display:none;"><input type="text" value="{{$job_list->password}}"><i class="fa fa-fw fa-eye" id="hidepassword" data-id="{{$job_list->id}}" data-back_url="{{url('/Job-listing-websites')}}"></i></td>
                                            <td><label class="{{Helper::statusClass($job_list->status)}}">{{$job_list->status}}</label></td>
                                            <td>--</td>
                                            <td><a href="{{url('/Edit-job-listing-websites')}}/{{$job_list->id}}"> <span class="edit_icon lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>

                                                <a class="common_delete" href="javascript:void(0);" data-toggle="modal" data-backdrop="static" data-target=".common_delete_modal" data-url="{{url('/Delete-job-listing-websites')}}" data-back_url="{{url('/Job-listing-websites')}}" data-id="{{$job_list->id}}"> <span class="trash-icon lnr lnr-trash position-relative" data-toggle="tooltip" title="Delete"></span></a>

                                                <a href="{{url('/Show-job-listing-websites')}}/{{$job_list->id}}" target="_blank"> <i class=" eye_icon fa fa-fw fa-eye" data-toggle="tooltip" title="View"></i></a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>{{env('NO_RECORDS_FOUND')}}</td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            {{$jobListing->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection