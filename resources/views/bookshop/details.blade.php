@extends('layout.home', [
    'current_page' => 'bookshop_details'    
])

@section('content')
<h1>{{$bookshop->name}}</h1>
<h3>Location: {{$bookshop->city}}</h3>
<h4>List of books</h4>
@if($bookshop->books)
    @foreach($bookshop->books as $book)
    <li>
        {{$book->title}}
    </li>
    @endforeach
@endif
@endsection