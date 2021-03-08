@extends('layouts.app')

@section('content')
    @include('admin.nav.sidebar')
    <div id="content">
        @include('admin.nav.navbar')
        @include('admin.import')
        @yield('content-body')
    </div>
@endsection
