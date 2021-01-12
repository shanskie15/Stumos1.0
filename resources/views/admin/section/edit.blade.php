
<!-- <form method="post" action="{{ route('section.update', $section->id) }}" autocomplete="off" class="form-horizontal"> -->
<form>
{{ csrf_field() }}
    <div class="form-group row">
      <label for="section_name" class="col-md-4 col-form-label text-md-right">Section Name</label>
      <div class="col-md-6">
        <input id="section_name" value="{{$section->section_name}}" type="text" class="form-control" name="firstname" required autofocus>

          <span class="invalid-feedback" role="alert">
            <strong></strong>
          </span>
      </div>
    </div>
    <div class="form-group row">
      <label for="room_number" class="col-md-4 col-form-label text-md-right">Room Number</label>
      <div class="col-md-6">
          <input id="room_number" value="{{$section->room_number}}" type="text" class="form-control" name="middlename" required>

          <span class="invalid-feedback" role="alert">
            <strong></strong>
          </span>
      </div>
    </div>
    <div class="form-group row">
      <label for="user_id" class="col-md-4 col-form-label text-md-right">Teacher/Adviser</label>
      <div class="col-md-6">
          <select name="user_id" class="form-control">
            @foreach($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->firstname}} {{$employee->lastname}}</option>
            @endforeach
          </select>

          <span class="invalid-feedback" role="alert">
            <strong></strong>
          </span>
      </div>
    </div>
</form>