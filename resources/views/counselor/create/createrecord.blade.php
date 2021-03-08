@extends('counselor.counselor_layout')
@section('css')
    
@endsection
@section('counselor-body')
<div class="card" style="margin:2%;">
    <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            Create Record
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <a href="{{route('counselor.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
    </div>
    </div>
    <div class="card-body">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ url('guidancestore') }}" autocomplete="off" class="form-horizontal">
        @csrf
        @method('post')
        <div class="row">
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Student Name') }}</label>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <select name="student_id" class="form-control">
                    <option value="#"></option>
                    @foreach($counselors as $counselor)
                        @foreach($students as $student)
                            @if($counselor->student_id == $student->id)
                                <option value="{{$student->id}}">{{$student->firstname}} {{$student->lastname}}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>   
            </div>
        </div>
        </div>
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Record Type') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                {{-- <select name="record" id="record_type" class="form-control" onchange="return showDescription();" > --}}
                <select name="record" id="record_type" class="form-control">
                    <option value="counselling">Counselling</option>    
                    <option value="bad_record">Bad Record</option>
                </select>
            </div>
            </div>
        </div>
        {{-- <div class="row"  style="visibility: hidden;"> --}}
            <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Bad Deed') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <select name="bad_deed" id="bad_deed" class="form-control" >
                        <option value="Bullying">Bullying</option>
                        <option value="Stealing">Stealing</option>
                        <option value="CuttingClasses">Cutting Classes</option>
                        <option value="Absent">Absent</option>
                        <option value="Others">Others</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row">
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Description') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group" >
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