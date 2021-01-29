@extends('clinic.clinic_layout')

@section('clinic-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
          Student
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
                  <a href=><button class="btn btn-primary"><i class="far fa-list-alt"></i>Consult</button></a>
                  <button onclick="deleteStudent({{$student->id}},this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Cancel</button>
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