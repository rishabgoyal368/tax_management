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
                        <a href="{{url('/Add-job-listing-websites')}}" class="float-right add-doc text-primary">Add Job Listing Websites
                        </a>

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
                                    <option disabled>select Plateform</option>

                                        @foreach($joblist as $value2)
                                        <option value="{{$value2->id}}"  @if(!empty($link)) @if(in_array($value2->id,$link)) selected @endif @endif>{{$value2->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="selectpicker" multiple data-live-search="true" id="emailSelect" name="webemail[]" data-style="form-control btn-default btn-outline">
                                    <option disabled>select Email</option>
                                    @foreach($joblist as $value3)
                                    <option value="{{$value3->id }}" @if(!empty($email)) @if(in_array($value3->id,$email)) selected @endif @endif>{{$value3->email}}</option>
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
                                        <option disabled>select Status</option>
                                        @foreach($joblist as $value)
                                        <option value="{{$value->id}}" @if(!empty($status)) @if(in_array($value->id,$status)) selected @endif @endif>{{$value->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info mr-10" id='job_list_submit'> Search</button>
                                    <a class="btn btn-danger" href="{{url('/Job-listing-websites')}}"> Reset</a>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value='{{@$index}}' name="" id='index'>
                        <input type="hidden" value='{{@$searchplateform}}' name="" id='PlateformName'>
                        <input type="hidden" value='{{@$searchemail}}' name="" id='Emailname' id="Emailname">
                        <input type="hidden" value='{{@$searchstatus}}' name=""  id='Statusname'><input type="hidden" value='{{@$searchlink}}' name=""  id='LinkName'>

                    </form>
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-fw fa-arrow-up sortCick" data-value='asc' data-name='index' data-id='index' data-submit='job_list_submit'></i>S.no<i class="fa fa-fw fa-arrow-down sortCick" data-value='desc' data-name='index' data-id='index' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortplateform" data-value='asc' data-name='PlateformName' data-id='PlateformName' data-submit='job_list_submit'></i>Platform name<i class="fa fa-fw fa-arrow-down sortplateform" data-value='desc' data-name='PlateformName' data-id='PlateformName' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortlink" data-value='asc' data-name='LinkName' data-id='LinkName' data-submit='job_list_submit'></i>Link to visit the platform<i class="fa fa-fw fa-arrow-down sortlink" data-value='desc' data-name='LinkName' data-id='LinkName' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortemail" data-value='asc' data-name='Emailname' data-id='Emailname' data-submit='job_list_submit'></i>Email<i class="fa fa-fw fa-arrow-down sortemail" data-value='desc' data-name='Emailname' data-id='Emailname' data-submit='job_list_submit'></i></th>

                                            <th><i class="fa fa-fw fa-arrow-up sortstatus" data-value='asc' data-name='Statusname' data-id='Statusname' data-submit='job_list_submit'></i>Status<i class="fa fa-fw fa-arrow-down sortstatus" data-value='desc' data-name='Statusname' data-id='Statusname' data-submit='job_list_submit'></i></th>
                                            <th>Active leads</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($jobListing as $key => $job_list)
                                        <tr>
                                            <td>{{($jobListing->currentpage()-1) * $jobListing->perpage() + $key + 1}}</td>
                                            <td>{{$job_list->name}}</td>
                                            <td><a href="{{$job_list->website}}" target="_blank">{{$job_list->website}}</a></td>
                                            <td>{{$job_list->email}}</td>
                                            <td><label class="{{statusClass($job_list->status)}}">{{$job_list->status}}</label></td>
                                            <td>--</td>
                                            <td><a href="{{url('/Edit-job-listing-websites')}}/{{$job_list->id}}"> <span class="lnr lnr-pencil position-relative" data-toggle="tooltip" title="Edit"></span></a>
                                            
                                            <a href="javascript:void(0);" data-toggle="modal" data-backdrop="static" class="common_delete" data-target=".common_delete_modal" data-url="{{url('/Delete-job-listing-websites')}}" data-back_url="{{url('/Job-listing-websites')}}" data-id = "{{$job_list->id}}"> <span class="lnr lnr-trash position-relative" data-toggle="tooltip" title="Delete"></span></a>
                                            
                                            <a href="{{url('/Show-job-listing-websites')}}/{{$job_list->id}}" target="_blank" > <i class="fa fa-fw fa-eye" style="color:blue;" data-toggle="tooltip" title="View"></i></a></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            {{env('NO_RECORDS_FOUND')}}
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