{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @include('counselor.navbar.nav')
            <div class="content">
                <div class="card">
                    <div class="card-body col-lg-12 col-md-12 col-sm-12">
                        @yield('counselor-body')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
    @include('counselor.navbar.sidebar')
    <div id="content">
        @include('counselor.navbar.nav')   
        @yield('counselor-body')
    </div>
@endsection
