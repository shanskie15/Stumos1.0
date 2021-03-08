@extends('counselor.counselor_layout')

@section('counselor-body')
  <div class="card" style="margin:2%;">
      <div class="card-header">
        <div>
            <h2>{{$student->lastname}}, {{$student->firstname}} {{$student->middlename}}</h2>
            <h3>{{$student->year}}</h3>
        </div>
      </div>
      @include('counselor.student.nav')
      <div class="card-body">
      <div class="row">
        <div class="table-responsive">
          <table class="table" id="studentTable">
            <thead class="text-primary">
              <th>Type</th>
              <th>Reason</th>
              <th>Student ID</th>
              <th>Counselor ID</th>
              <th style="width:30%">Actions</th>
            </thead>
            <tbody>
                  <tr>
                    @foreach($badrecords as $badrecord)
                    <td>
                    {{$badrecord['bad_deed']}}
                    </td>
                    <td>
                    {{$badrecord['description']}}
                    </td>
                    <td>
                    {{$badrecord['student_id']}}   
                    </td>
                    <td>
                    {{$badrecord['user_id']}}
                    </td>
                    <td>
                    <button class="btn btn-sm btn-primary"><i class="far fa-list-bars"></i>View</button>
                    </td>
                  </tr>
                  @endforeach   
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection