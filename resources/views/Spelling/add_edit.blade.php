@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" name="joblist" id="designation" action="{{url('/add-spellings')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$content->id ?: old('id') }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            {{@$label}}
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label for="">Title image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($errors->has('image'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                                @if(@$content['image'])
                                <a href="{{env('APP_URL')}}/uploads/{{$content->image}}" target="_blank">{{$content->image}}</a>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Spelling</label>
                                <textarea id="summernote" name="description" >{{@$content->description}}</textarea>
                                @if ($errors->has('description'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>                          
                            <div class="col-md-12 form-group">
                                <label for="">Audio</label>
                                <input type="file" name="audio" id="audio" class="form-control">
                                @if ($errors->has('audio'))
                                <span class="text-error" role="alert">
                                    <strong>{{ $errors->first('audio') }}</strong>
                                </span>
                                @endif
                                @if(@$content['audio'])
                                <a href="{{env('APP_URL')}}uploads/{{$content->audio}}" target="_blank">{{$content->audio}}</a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row grow">
                    <div class="col-12">
                        <div class="submit-section text-center btn-add">
                            <input type="submit" value="Save" class="btn btn-theme text-white ctm-border-radius button-1">
                            <a href="{{url('/manage-spellings')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection