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
                        {{ $user->firstname.' '.$user->lastname }}
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
                        <a href="{{ route('student.edit', $student->id)}}" class="btn btn-primary" type="button">Edit</a>
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


@section('js')
@include('inc.students')
@endsection