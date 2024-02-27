@extends ('layout.home', [
    'current_page' => 'write-review'
])

@section('content')
<h1>Write your review</h1>

@if (count($errors) > 0)
<div>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<form action="{{ route('review.add', ['book_id' => $book_id]) }}" method="post">
    @csrf
    <label for="review" style="font-weight: bold; font-size: 2rem;">Write your review:</label> <br>
    <textarea name="review" id="review" cols="30" rows="10" required>{{old('review')}}</textarea><br>
    <button>Submit</button>
</form>
@endsection