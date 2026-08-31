@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <p class="mb-2 text-sm font-semibold uppercase tracking-widest" style="color: var(--accent);">The reading room</p>
        <h1 class="page-heading text-4xl">Books</h1>
        <p class="mt-2 text-sm" style="color: var(--muted);">Find your next great read, by mood or by the crowd.</p>
    </div>
    <form class="mb-4 flex items-center space-x-2" action="" method="GET" action="{{ route('books.index') }}">
        <input name="title" placeholder="Search by title" type="text" value="{{ request('title') }}" class="input h-11">
        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <button class="btn btn-primary h-11" type="submit">Search</button>
        <a href="{{ route('books.index') }}" class="btn h-11">Clear</a>
    </form>

    <div class="filter-container">
        @php
            $filters=[
                ''=> 'Latest',
                'popular_last_month'=> 'Trending This Month',
                'popular_last_6months'=> 'Trending Last 6 Months',
                'highest_rated_last_month'=> 'Top Rated This Month',
                'highest_rated_last_6months'=> 'Top Rated Last 6 Months',
            ];
        @endphp

        @foreach ($filters as $key => $label)
            <a href="{{ route('books.index', [...request()->query(),'filter'=> $key]) }}" class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>
    <ul>
        @forelse ( $books as $book)
        <li class="mb-4">
        <div class="book-item">
            <div
            class="flex flex-wrap items-center justify-between">
            <div class="w-full flex-grow sm:w-auto">
                <a href="{{ route('books.show',$book) }}" class="book-title">{{ $book ->title}}</a>
                <span class="book-author">{{ $book ->author }}</span>
            </div>
            <div>
                <div class="book-rating">
                <x-star-rating :rating="$book->reviews_avg_rating" />
                </div>
                <div class="book-review-count">
                out of {{ $book->reviews_count }} {{ Str::plural('review',$book->reviews_count) }}
                </div>
            </div>
            </div>
        </div>
        </li>
        @empty
        <li class="mb-4">
        <div class="empty-book-item">
            <p class="empty-text">No books found</p>
            <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
        </div>
        </li>      
        @endforelse
    </ul>
@endsection