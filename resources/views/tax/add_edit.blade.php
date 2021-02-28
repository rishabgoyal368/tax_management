@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation" action="{{url('/add-tax')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$task->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            {{@$label}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="text" name="name" id="name" required class="form-control" autocomplete="off" placeholder="Tax Name*" value="{{@$task->name ?: old('name') }}">
                                @if ($errors->has('name'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="form-control " name="parent_id">
                                    <option value="default" selected disabled>Select Sub Menu</option>
                                    @foreach($taxes as $value)
                                    <option value="{{$value['id']}}" @if(@$task['parent_id']==$value['id']) selected @endif>{{$value['name']}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('name'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="col-md-12 form-group">
                                <input type="file" name="image" id="image" class="form-control" {{ @$task['id'] ? '' : 'required' }} >
                                @isset($task['image'])
                                <a href="{{env('APP_URL').'uploads/'.Auth::user()->profile_pic}}" target="_blank">{{Auth::user()->profile_pic}}</a>
                                @endisset
                                @if ($errors->has('image'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control " name="status" required>
                                    <option selected disabled>Select Status</option>
                                    <option @if((@$task->status ) == 'Active') selected @endif value="Active">Active</option>
                                    <option @if((@$task->status ) == 'Deactivated') selected @endif value="Deactivated">Deactivated</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row grow">
                    <div class="col-12">
                        <div class="submit-section text-center btn-add">
                            <input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
                            <a href="{{url('/manage-tax')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection