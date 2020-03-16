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
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Platform name</th>
                                            <th>Link to visit the platform</th>
                                            <th>Email</th>
                                            <th>Status</th>
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
                                            <td>{{$job_list->status}}</td>
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