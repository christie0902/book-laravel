@extends('layout.home')

@section('main-content')
<h1>Welcome to our BOOK FORUM</h1>

<div class="book_container">
    @foreach($books as $book)
    <div class="book_card">
    <h2 class="book_title">Title: {{$book->title}}</h2>
    <img src="{{$book->image}}" alt="image of {{$book->title}}" class="book_image">
    <p>Published date: {{$book->publication_date}}</p>
    <p>Language: {{$book->language}}</p>
    <div class="description">Description: {{ strip_tags($book->description) }}<</div>
    {{-- strip_tags: function to remove html tags --}}
    <div>
    @endforeach
</div>
@endsection