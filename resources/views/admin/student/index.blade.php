@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
          Student
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
          <a href="{{route('student.create')}}"><button class="btn btn-primary">Create Student</button></a>
        </div>
      </div>
    </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="studentTable">
          <thead class="text-primary">
            <th>Name</th>
            <th>Year</th>
            <th>Section</th>
            <th style="width:30%">Actions</th>
          </thead>
          <tbody>
            @foreach($students as $student)
              @if($student->delete != 1)
                <tr>
                  <td>
                    {{$student->lastname}}, {{$student->firstname}} {{$student->middlename[0]}}.
                  </td>
                  <td class="text-uppercase">
                    {{ $student->year }}
                  </td>
                  <td>
                  @foreach($sections as $section)
                    @if ($section->id == $student->section_id)
                      {{ $section->section_name }} 
                    @endif
                  @endforeach
                  </td>
                  <td>
                  <a href="{{route('student.show', $student->id)}}"><button class="btn btn-primary"><i class="far fa-list-alt"></i>View</button></a>
                  <a href="{{route('student.edit', $student->id)}}"><button class="btn btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                  <button onclick="deleteStudent({{$student->id}},this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
@include('inc.students')
@endsection