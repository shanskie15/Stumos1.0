@extends('layouts.app')

@section('content')
    @include('library.nav.sidebar')
    <div id="content">
        @include('library.nav.nav')    
        @yield('library-body')
    </div>
@endsection
