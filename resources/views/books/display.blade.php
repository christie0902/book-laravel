@extends('layout.home', [
    'current_page' => 'home'    
])

@section('content')
    <h1>WELCOME 
    {{-- if authenticated = true --}}
    @auth 
        {{ auth()->user()->name }}
    @endauth
    </h1>
    @include('common.search')
    <div id="partners"></div>
    @viteReactRefresh
    @vite('resources/js/partners.jsx')    
    <div class="book_container">
        @foreach($books as $book)
        <div class="book_card">
        <h2 class="book_title">Title: {{$book->title}}</h2>
        <img src="{{$book->image}}" alt="image of {{$book->title}}" class="book_image">
        <p>Published date: {{$book->publication_date}}</p>
        <p>Language: {{$book->language}}</p>
        <div class="description">Description: {{ strip_tags($book->description) }}</div>
        {{-- strip_tags: function to remove html tags --}}
        <div>
        <a href="{{route('book.details',['book_id'=>$book->id])}}">See details</a>
        @endforeach
    </div>


    
    <ul id="latest-books"></ul>
    @vite('resources/js/latest-book.js')

  
@endsection