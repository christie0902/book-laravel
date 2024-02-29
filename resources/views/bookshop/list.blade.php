@extends('layout.home', [
    'current_page' => 'bookshop'    
])
@section('content')
<h1>LIST OF BOOKSHOPS</h1>
<ul>
    @foreach ($bookshops as $bookshop)
       <li>{{$bookshop->name}}</li>
       <a href="{{route('bookshop.detail', ['id'=>$bookshop->id])}}">See details</a>
    @endforeach
</ul>
@endsection