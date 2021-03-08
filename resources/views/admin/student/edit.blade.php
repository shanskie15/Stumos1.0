
@extends('admin.admin_layout')
@section('css')
    
@endsection
@section('content-body')
<div class="card" style="margin:2%;">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-10 col-md-10 col-lg-10">
                Edit Student
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <a href="{{route('student.index')}}"><button class="btn btn-primary" style="float:right;">Back</button></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form method="post" action="{{ route('student.update', $student->id) }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('First Name') }}</label>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input class="form-control" name="firstname" id="input-section" type="text" value="{{ old('first_name',$student->firstname) }}" required/>
                            </div>
                        </div>
                        <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Middle Name') }}</label>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input class="form-control" name="middlename" id="input-section" type="text" value="{{ old('middle_name',$student->middlename) }}" required/>
                            </div>
                        </div>
                        <label class="col-sm-1 col-md-1 col-lg-1 col-form-label">{{ __('Last Name') }}</label>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <input class="form-control" name="lastname" id="input-section" type="text" value="{{ old('last_name',$student->lastname) }}" required/>
                            </div>
                        </div>
                        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Year') }}</label>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input class="form-control" name="year" id="input-section" type="text" value="{{ old('year',$student->year) }}" required />
                            </div>
                        </div>
                        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Contact') }}</label>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input class="form-control" name="contact" id="input-section" type="text" value="{{ old('year',$student->contact) }}" required />
                            </div>
                        </div>
                        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label" for="input-year">{{ __('Guardian Name') }}</label>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="parent_name" id="input-year" value="{{ old('parent_name',$student->parent_name) }}" required />
                            </div>
                        </div>
                        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Guardian Contact') }}</label>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <input class="form-control" name="pcontact" id="input-section" type="text" value="{{ old('pcontact',$student->pcontact) }}" required />
                            </div>
                        </div>
                        <label class="col-sm-2 col-md-2 col-lg-2 col-form-label">{{ __('Section') }}</label>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <select name="section_id" class="form-control">
                                    @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection