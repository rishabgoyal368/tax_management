@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation" action="{{url('/add-task')}}">
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
                                <input type="text" name="name" id="name" required class="form-control" autocomplete="off" placeholder="Task Name*" value="{{@$task->task_name ?: old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="form-control " name="task_id" required>
                                    <option value="default" selected disabled>Select task from app</option>
                                    @foreach($tasks as $value)
                                    <option value="{{$value['id']}}" @if(@$task['task_id'] == $value['id']) selected  @endif>{{$value['task_name']}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('name'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                           

                            <div class="col-md-12 form-group">
                                <select class="form-control " name="user" required>
                                    <option value="default" selected disabled>Select User</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" @if(@$task['alocate_to'] == $user->id) selected  @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('name'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                           

                            <div class="col-md-12 form-group mb-0">
                                <select class="form-control " name="status" required>
                                    <option selected disabled>Select Status</option>
                                    <option @if((@$task->status ) == 'Done') selected @endif value="Done">Done</option>
                                    <option @if((@$task->status ) == 'Pending') selected @endif value="Pending">Pending</option>
                                    <option @if((@$task->status ) == 'Running') selected @endif value="Running">Running</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="siteLogo_error" role="alert">
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
                            <a href="{{url('/task-list')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection