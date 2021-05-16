@extends('Layout.app')
@section('title','View Financial List')
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$task->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            View Financial List
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">User Name -  {{ ucfirst(@$financial_list_details->user->name) }}
                            </div>
                            <?php
                                $base_url = asset('financial_list_add/'); 
                            ?>
   
                            <div class="col-md-12 form-group">Yearly Budget - <a href="{{ $base_url }}/{{$financial_list_details['yearly_budget']}}">Check Document <i class="fa fa-eye"></i></a>
                            </div>
                      
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection
