@extends('admin.admin_layout')
@section('css')

@endsection
@section('content-body')
<div class="card" style="margin:2%;">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10">
               Create Section
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <a href="{{route('section.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
            </div>
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('section.store') }}" autocomplete="off" class="form-horizontal">
                @csrf
                @method('post')
                <div class="row">
                    <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Section Name') }}</label>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <input class="form-control" name="section_name" type="text" placeholder="{{ __('Section Name') }}" required />
                        </div>
                    </div>
                    <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Room Number') }}</label>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <input class="form-control" name="room_number" type="text" placeholder="{{ __('Room Number') }}" required />
                        </div>
                    </div>
                    <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Teacher/Adviser') }}</label>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <select name="employee_id" class="form-control">
                                <option value="#"></option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn btn-primary">{{ __('Add Section') }}</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
