@extends('Layout.app')
@section('title',@$label)
@section('content')

<!-- Sidebar -->
@include('Layout.sidebar')
<!-- /Sidebar -->

<div class="col-xl-9 col-lg-8  col-md-12">
    <div class="row">
        <div class="col-xl-12 col-lg-8 col-md-12">
            <form method="POST" id="designation" action="{{url('/add-content')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{@$content->id }}">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">
                            Update content
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <select id="" class="form-control" name="tax">
                                <option value="">Select Tax</option>
                                <option value="1" @if(@$content['tax'] == '1') selected @endif >Income tax</option>
                                <option value="2" @if(@$content['tax'] == '2') selected @endif >Additional tax</option>
                                <option value="3" @if(@$content['tax'] == '3') selected @endif >Social Insurance</option>
                                <option value="4" @if(@$content['tax'] == '4') selected @endif >Salaries tax</option>
                                <option value="5" @if(@$content['tax'] == '5') selected @endif >Official documents</option>
                                <option value="6" @if(@$content['tax'] == '6') selected @endif >Add/Deduct tax</option>
                                <option value="7" @if(@$content['tax'] == '7') selected @endif >Companies Establishment</option>
                                <option value="8" @if(@$content['tax'] == '8') selected @endif >Financial List</option>
                                </select>
                                @if ($errors->has('tax'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('tax') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <textarea name="content" id="summernote" cols="30" rows="10"> {{old('content') ?: @$content['content']}}</textarea>
                                @if ($errors->has('content'))
                                <span class="error" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
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
                            <a href="{{url('/content')}}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>



@endsection