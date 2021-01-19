@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
  <div class="card-header">
    <div class="row">
        <div class="col-sm-10 col-md-10 col-lg-10">
            Create Employees
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <a href="{{route('employees.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
        </div>
        </div>
    </div>
  <div class="card-body">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="post" action="{{ route('employees.store') }}" autocomplete="off" class="form-horizontal">
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
                <input class="form-control" name="middlename" type="text" placeholder="{{ __('Middle Initial') }}" required/>
            </div>
            </div>
            <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Last Name') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="form-group">
                <input class="form-control" name="lastname" type="text" placeholder="{{ __('Last Name') }}" required/>
            </div>
            </div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Contact Number') }}</label>
            <div class="col-sm-3 col-md-3 col-lg-3">
            <div class="form-group">
                <input class="form-control" name="contact" type="text" placeholder="{{ __('(+63)') }}" required="true" aria-required="true"/>
            </div>
            </div>
            <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Address') }}</label>
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <input class="form-control" name="address" type="text" placeholder="{{ __('Address') }}" required="true" aria-required="true"/>
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
                <input id="birth_date" type="date" max="{{date('Y-m-d', strtotime('-21 years'))}}" class="form-control" name="birth_date"  required>
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Email') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required />
            </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Personnel Type') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <select name="personnel_type" class="form-control">
                        <option value="Teacher">Teacher</option>
                        <option value="Counselor">Councelor</option>
                        <option value="HealthCareProfessional">HealthCareProfessional</option>
                        <option value="Librarian">Librarian</option>
                        <option value="Principal">Principal</option>
                </select>
            </div>
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label" for="input-password">{{ __(' Password') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="input-password" placeholder="{{ __('Password') }}" required />
            </div>
            </div>
            <label class="col-sm-2 col-md-2 col-lg-2 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" required />
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <button type="submit" class="btn btn-primary">{{ __('Add Employee') }}</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection