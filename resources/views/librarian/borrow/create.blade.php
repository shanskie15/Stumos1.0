@extends('librarian.librarian_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
    <div class="card-header">
      Create Borrow
    </div>
    <div class="card-body">
      <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
          <form method="post" action="{{ route('librarian.store') }}" autocomplete="off" class="form-horizontal">
          @csrf
          @method('post')
          <p>Student Name</p>
          <div class="row">
              <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('First Name') }}</label>
              <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <input class="form-control" name="fname" type="text" placeholder="{{ __('First Name') }}" required/>
              </div>
              </div>
              <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Middle Initial') }}</label>
              <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <input class="form-control" name="mname" type="text" placeholder="{{ __('Middle Initial') }}" required/>
              </div>
              </div>
              <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Last Name') }}</label>
              <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <input class="form-control" name="lname" type="text" placeholder="{{ __('Last Name') }}" required/>
              </div>
              </div>
          </div>
          {{-- hidden libraran --}}
          <input class="form-control" name="fnamelib" type="hidden" placeholder="{{ __('First Name') }}" value="{{auth()->user()->firstname}}" required/>
          

          {{-- hidden libraran --}}
          
          <div class="row form-group">
              <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Contact Number') }}</label>
              <div class="col-sm-3 col-md-3 col-lg-3">
              <div class="form-group">
                  <input class="form-control" name="contact" type="text" placeholder="{{ __('(+63)') }}" required="true" aria-required="true"/>
              </div>
              </div>
              
              
          </div>
          <p>Book Details</p>
          
          <div class="row">
              <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Book Name') }}</label>
              <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <input class="form-control" name="bookname" type="text" placeholder="{{ __('Book Name') }}" required />
              </div>
              </div>
              <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Return Date') }}</label>
              <div class="col-sm-4 col-md-4 col-lg-4">
                <input id="datetoreturn" type="date" max="{{date('Y-m-d', strtotime('-21 years'))}}" class="form-control" name="datetoreturn"  required>
                <span class="invalid-feedback" role="alert">
                  <strong></strong>
                </span>
            </div>
          </div>
          
          <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 text-center">
              <button type="submit" class="btn btn-primary">{{ __('Create Borrow') }}</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection