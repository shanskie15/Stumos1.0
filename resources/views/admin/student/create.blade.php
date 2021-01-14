<div class="card" style="margin:2%;">
  <div class="card-header">
    Student
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ route('student.store') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <div class="row">
            <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('First Name') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                <input class="form-control" name="firstname" type="text" placeholder="{{ __('First Name') }}" required/>
              </div>
            </div>
            <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Middle Initial') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                <input class="form-control" name="middlename" type="text" placeholder="{{ __('Middle Name') }}" required/>
              </div>
            </div>
            <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Last Name') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                <input class="form-control" name="lastname" type="text" placeholder="{{ __('Last Name') }}" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Address') }}</label>
            <div class="col-sm-5 col-md-5 col-lg-5">
              <div class="form-group">
                <input class="form-control" name="address" type="text" placeholder="{{ __('Address') }}" required/>
              </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Section') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                <select name="section_id" class="form-control">
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->section_name}} {{$section->room_number}}</option>
                    @endforeach
                </select> 
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Gender') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
              <select name="gender" class="form-control" id="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">Date of Birth</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <input id="birthdate" type="date" max="{{date('Y-m-d', strtotime('-21 years'))}}" class="form-control" name="birthdate"  required>
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Year') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
              <select name="year" class="form-control" id="year" required>
                <option value="junior">Junior</option>
                <option value="senior">Senior</option>
              </select>
              </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Contact') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <input class="form-control" name="contact" type="text" placeholder="{{ __('(+63))') }}" required />
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label" for="input-year">{{ __('Guardian Name') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <input class="form-control" type="text" name="parent_name" id="input-year" placeholder="{{ __('Guardian Name') }}" required />
              </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Guardian Contact') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                <input class="form-control" name="pcontact" type="text" placeholder="{{ __('(+63)') }}" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <button type="submit" class="btn btn-primary">{{ __('Create Student') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>