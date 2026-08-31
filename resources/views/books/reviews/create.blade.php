@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Add Review for {{ $book->title }}</h1>

    <form action="{{ route('books.reviews.store',$book) }}" method="POST">

        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review" required class="input mb-4"></textarea>
    
        <label for="rating">Rating</label>

        <select class="input mb-4 required" name="rating" id="rating">
            <option value="">Select a rating</option>
            @for ($i = 1;$i<=5;$i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <button class="btn" type="submit">Add review</button>
        </form>
@endsection