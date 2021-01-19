
@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            Edit Section
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <a href="{{route('section.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
        </div>
    </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ route('section.update', $section->id) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="form-group row">
              <label for="section_name" class="col-md-4 col-form-label text-md-right">Section Name</label>
              <div class="col-md-6">
                <input id="section_name" value="{{$section->section_name}}" type="text" class="form-control" name="firstname" required autofocus>

                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="room_number" class="col-md-4 col-form-label text-md-right">Room Number</label>
              <div class="col-md-6">
                  <input id="room_number" value="{{$section->room_number}}" type="text" class="form-control" name="middlename" required>

                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="user_id" class="col-md-4 col-form-label text-md-right">Teacher/Adviser</label>
              <div class="col-md-6">
                  <select name="user_id" class="form-control">
                    @foreach($employees as $employee)
                      @if($section->user_id == $employee->id)
                        <option selected="{{ $employee->id }}"> {{$employee->lastname}}, {{ $employee->firstname}}</option>
                      @elseif($section->user_id != $employee->id)
                        <option value="{{ $employee->id }}"> {{$employee->lastname}}, {{ $employee->firstname}}</option>
                      @endif
                    @endforeach
                  </select>

                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection