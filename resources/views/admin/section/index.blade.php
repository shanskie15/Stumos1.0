@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="row" style="margin:2%;">
  <div class="col-sm-2 col-md-4 col-lg-2">
      <a href="#"><button class="btn btn-primary">Import Section</button></a>
  </div>
  <div class="col-sm-2 col-md-4 col-lg-2">
      <a href="{{ route('section.export')}}"><button class="btn btn-primary">Export Section</button></a>
  </div>
</div>
<div class="card" style="margin:2%;">
  <div class="card-header">
  <div class="row">
      <div class="col-sm-10 col-md-9 col-lg-10">
        <p>Sections</p>
      </div>
      <div class="col-sm-2 col-md-3 col-lg-2">
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
                  <button class="btn btn-sm btn-primary" onclick="viewSection({{$section->id}})" data-target="#bigModal" data-toggle="modal"><i class="far fa-list-alt"></i>View</button>
                  <a href="{{route('section.edit', $section->id)}}"><button class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Edit</button></a>
                  <button onclick="deleteStudent({{$section->id}},this)" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i>Delete</button>
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

{{-- Modal --}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header card-header" style="background-color:#108790;color:white">
        <h5 class="modal-title" id="modalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body card-body" id="modalBody"></div>
      <div class="modal-footer card-footer" style="background-color:#108790;color:white">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelNormal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveNormal">Save changes</button>
        
      </div>
    </div>
  </div>
</div>

{{-- Big modal --}}
<div class="modal fade" id="bigModal" tabindex="-1" role="dialog" aria-labelledby="bigModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bigModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bigModalBody"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelBig">Cancel</button>
        <button type="button" id="saveBig" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection