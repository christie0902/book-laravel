@extends ('layout.home', [
    'current_page' => 'details'
])

@section('content')
<div class="detail_container">
<h1>Details of {{$book->title}}</h1>
<img src="{{$book->image}}" alt="photo">
<h3>Price: {{$book->price}}</h3>
<p>Pubished date: {{$book->publication_date}}</p>
<p>Language: {{$book->language}}</p>
<p>Pages: {{$book->pages}}</p>
<div>{{strip_tags($book->description)}}</div>
</div>
<h1>REVIEWS</h1>

@if ($book->reviews)

<ul>
    @foreach ($book->reviews as $review)
        <li>
            Writer: {{ $review->user->name }} <br>
            Review: {{$review->text}}
        </li>
    @endforeach
</ul>
@else
<p style="font-size:1rem; text-align:center;">No reviews yet.</p>
@endif

<a href="{{ route('review.create', ['book_id' => $book->id]) }}">Write Review</a>

@endsection