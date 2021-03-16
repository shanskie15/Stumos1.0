@extends('library.library_layout')

@section('library-body')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            {{-- <img class="detail-img" src="{{$borrows['gallery']}}" alt=""> --}}
        </div>
        <div class="col-sm-6">
            <a href="/viewreturned"><button class="btn btn-primary">Back</button></a>
            @foreach ($borrows as $borrow)
            <h2>Book Name:{{$borrow->bookname}}</h2>
            <h3>Borrowers Name:{{$borrow->lastname}} {{$borrow->firstname}}</h3>
            <h4>Reminder:{{$borrow->description}}</h4>
            <br><br>
            @endforeach
            
            
        </div>
    </div>
   </div>
@endsection