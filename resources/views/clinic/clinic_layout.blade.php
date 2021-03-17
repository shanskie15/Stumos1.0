@extends('layouts.app')

@section('content')
    @include('admin.nav.sidebar')
    <div id="content">
        @include('admin.nav.navbar')
        @yield('content-body')
    </div>
@endsection
