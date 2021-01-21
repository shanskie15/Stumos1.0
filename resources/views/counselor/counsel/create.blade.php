@extends('counselor.counselor_layout')
@section('css')
    
@endsection
@section('counselor-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            Create Counselling Session
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <a href="{{route('counselor.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
        </div>
    </div>
  <div class="card-body">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ url('storeBad') }}" autocomplete="off" class="form-horizontal">
        @csrf
        @method('post')
        <div class="row">
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Description') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <input class="form-control" name="description" type="text" placeholder="{{ __('Description') }}" required/>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <button type="submit" class="btn btn-primary">{{ __('Create Record') }}</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection