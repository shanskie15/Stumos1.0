@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
@include('admin.section.create')
<div class="card" style="margin:2%;">
  <div class="card-header">
    Section
  </div>
  <div class="card-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="sectionTable">
          <thead class=" text-primary">
            <th>
                {{ __('Section Name') }}
            </th>
            <th>
              {{ __('Room Number') }}
            </th>
            <th>
              {{ __('Teacher/Adviser') }}
            </th>
            <th class="text-right">
              {{ __('Actions') }}
            </th>
          </thead>
          <tbody>
            @foreach($sections as $section)
              <tr>
                <td>
                  {{ $section->section_name }}
                </td>
                <td>
                  {{ $section->room_number }}
                </td>
                <td>
                @foreach($users as $user)
                  @if ($user->id == $section->user_id)
                    {{ $user->first_name.' '.$user->last_name }}
                  @endif
                @endforeach
                </td>
                <td class="text-right">
                    <form action="{{ route('section.destroy', $section->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="#" class="btn btn-primary" type="button">View</a>
                        <a href="{{ route('section.edit', $section->id)}}" class="btn btn-primary" type="button">Edit</a>
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
@include('inc.sections')
@endsection