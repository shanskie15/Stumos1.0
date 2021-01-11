<div class="modal fade" id="bigModal" tabindex="-1" role="dialog" aria-labelledby="bigModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bigModalLabel">Edit {{$section->section_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bigModalBody">
        <form method="post" action="{{ route('section.update', $section->id) }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('PATCH')
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
                    @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->firstname}} {{$user->lastname  }}</option>
                    @endforeach
                  </select>

                  <span class="invalid-feedback" role="alert">
                    <strong></strong>
                  </span>
              </div>
            </div>
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelBig">Cancel</button>
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
    </div>
  </div>
</div>