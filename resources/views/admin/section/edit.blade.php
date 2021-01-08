@extends('admin.admin_layout', ['activePage' => 'section-management', 'titlePage' => __('Section Management')])

@section('content-body')
<div class="row">
  <div class="col-md-12">
    <form method="post" action="{{ route('section.update', $section->id) }}" autocomplete="off" class="form-horizontal">
      @csrf
      @method('PATCH')
      <div class="row">
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Section Name') }}</label>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
            <input class="form-control" name="section_name" id="input-section_name" type="text" value="{{ old('section_name', $section->section_name) }}" required />
          </div>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Room Number') }}</label>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
            <input class="form-control" name="room_number" id="input-room_number" type="text" value="{{ old('room_number', $section->room_number) }}" required />
          </div>
        </div>
        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Teacher') }}</label>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="form-group">
              <select name="user_id" class="form-control">
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->first_name .' '. $user->last_name  }}</option>
                @endforeach
              </select>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      </div>
    </form>
  </div>
</div>
@endsection