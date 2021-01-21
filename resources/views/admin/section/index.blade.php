@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
  <div class="row">
      <div class="col-sm-10 col-md-10 col-lg-10">
        <p>Sections</p>
      </div>
      <div class="col-sm-2 col-md-2 col-lg-2">
        <a href="{{route('section.create')}}"><button class="btn btn-primary">Create Section</button></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="sectionTable">
          <thead class="text-primary">
            <th>
                {{ __('Section Name') }}
            </th>
            <th>
              {{ __('Room Number') }}
            </th>
            <th>
              {{ __('Teacher/Adviser') }}
            </th>
            <th style="width:30%">
              {{ __('Actions') }}
            </th>
          </thead>
          <tbody>
            @foreach($sections as $section)
              @if($section->delete != 1)
                <tr>
                  <td>
                    {{ $section->section_name }}
                  </td>
                  <td>
                    {{ $section->room_number }}
                  </td>
                  <td>
                  @foreach($employees as $employee)
                    @if ($employee->id == $section->user_id)
                      {{ $employee->firstname}} {{$employee->lastname }}
                    @endif 
                  @endforeach
                  </td>
                  <td>
                  <a href="{{route('section.show', $section->id)}}"><button class="btn btn-primary"><i class="far fa-list-alt"></i>View</button></a>
                  <a href="{{route('section.edit', $section->id)}}"><button class="btn btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                  <button onclick="deleteStudent({{$section->id}},this)" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
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
@include('inc.sections')
@endsection