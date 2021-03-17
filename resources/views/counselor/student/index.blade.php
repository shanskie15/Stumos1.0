@extends('counselor.counselor_layout')

@section('counselor-body')
    <div class="card" style="margin:2%;">
    <div class="card-header">
      <div>
        <div>
          <a href="{{route('studentprofile', $student->id)}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
        <div>
            <h2>{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</h2>
            <h2 class="text-uppercase">{{$student->year}}</h2>
            <h2>{{$student->id}}</h2>
        </div>
      </div>
    </div>
@include('counselor.student.nav')

@endsection