@extends('counselor.counselor_layout')

@section('counselor-body')
    <div class="card" style="margin:2%;">
    <div class="card-header">
      <div>
          <h2>{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</h2>
          <h3>{{$student->year}}</h3>
          <div>
            <a href="{{route('counselor.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
          </div>
      </div>
    </div>
@include('counselor.student.nav')

@endsection