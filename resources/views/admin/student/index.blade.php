@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
@include('admin.student.create')
<div class="card" style="margin:2%;">
  <div class="card-header">
    Student
  </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="studentTable">
          <thead class=" text-primary">
            <th>
                {{ __('Name') }}
            </th>
            <th>
              {{ __('Year') }}
            </th>
            <th>
              {{ __('Section') }}
            </th>
            <th>
              {{ __('Teacher/Adviser') }}
            </th>
            <th class="text-right">
              {{ __('Actions') }}
            </th>
          </thead>
          <tbody>
            @foreach($students as $student)
              <tr>
                <td>
                  {{ $student->firstname.' '.$student->lastname }}
                </td>
                <td>
                  {{ $student->year }}
                </td>
                <td>
                @foreach($sections as $section)
                  @if ($section->id == $student->section_id)
                    {{ $section->section_name }} 
                </td>
                <td>
                    @foreach($users as $user)
                      @if ($user->id == $section->user_id)
                        {{ $user->firstname}} {{$user->lastname }}
                      @endif
                    @endforeach
                  @endif
                @endforeach
                </td>
                <td class="text-right">
                    <form action="{{ route('student.destroy', $student->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="#" class="btn btn-primary" type="button">View</a>
                        <button class="btn btn-success" data-target="#bigModal" data-toggle="modal"><i class="fas fa-edit"></i>Edit</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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


@section('js')
@include('inc.students')
@endsection