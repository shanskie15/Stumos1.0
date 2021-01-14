@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @include('clinic.navbar.nav')
            <div class="content">
                <div class="card">
                    <div class="card-body col-lg-12 col-md-12 col-sm-12 card-body-admin">
                        @yield('clinic-body')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection