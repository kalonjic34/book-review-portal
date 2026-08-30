<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_highest_rated_last_month_filter_renders_book_titles(): void
    {
        $book = Book::factory()->create([
            'title' => 'The Best Book',
            'author' => 'Jane Author',
        ]);

        Review::factory()->count(3)->for($book)->good()->create([
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->get('/books?filter=highest_rated_last_month');

        $response->assertOk();
        $response->assertSee('The Best Book');
    }
}
