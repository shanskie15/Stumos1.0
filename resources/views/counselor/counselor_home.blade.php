@extends('counselor.counselor_layout')

@section('counselor-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
  <div class="row">
      <div class="col-sm-10 col-md-10 col-lg-10">
        <p>Tapped In</p>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="sectionTable">
          <thead class="text-primary">
            <th>
                {{ __('Name') }}
            </th>
            <th>
              {{ __('Year') }}
            </th>
            <th>
              {{ __('Teacher/Adviser') }}
            </th>
            <th style="width:30%">
              {{ __('Actions') }}
            </th>
          </thead>
          <tbody>
            @foreach($students as $student)
              @if($student->delete != 1)
                <tr>
                  <td>
                    {{ $student->lastname }}, {{ $student->firstname }}
                  </td>
                  <td>
                    {{ $student->year }}
                  </td>
                  <td>
                  </td>
                  <td>
                  <form method="post" action="{{route('counselor.store')}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('post')
                    <input type="hidden" name="student_id" value="{{$student->id}}">
                    <button class="btn btn-primary" type="submit"><i class="far fa-list-alt"></i>Add</button>
                    </form>
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

<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
      <div class="col-sm-10 col-md-10 col-lg-10">
        <p>Studenst List</p>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="sectionTable">
          <thead class="text-primary">
            <th>
                {{ __('Student Name') }}
            </th>
            <th style="width:30%">
              {{ __('Actions') }}
            </th>
          </thead>
          <tbody>
            @foreach($counselors as $counselor)
              @if($counselor->delete != 1)
                @foreach($students as $student)
                    @if($counselor->student_id == $student->id)
                    <tr>
                    <td>
                        {{ $student->lastname }}, {{ $student->firstname }}
                    </td>
                    <td>
                    <a href="{{route('studentprofile', $student->id)}}"><button class="btn btn-sm btn-success"><i class="fas fa-bars"></i>View</button></a>
                    <a href=""> <i class="fas fa-trash"></i>Delete</button>
                    </td>
                    </tr>
                    @endif
                @endforeach
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection