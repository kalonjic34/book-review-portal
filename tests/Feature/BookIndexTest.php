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
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->get('/books?filter=highest_rated_last_month');

        $response->assertOk();
        $response->assertSee('The Best Book');
        $response->assertSee('★');
        $response->assertSee('☆');
        $response->assertSee('out of 3 reviews');
    }

    public function test_popular_last_month_filter_renders_filtered_rating_and_count(): void
    {
        $book = Book::factory()->create([
            'title' => 'The Trending Book',
        ]);

        Review::factory()->count(3)->for($book)->create([
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Review::factory()->count(2)->for($book)->create([
            'rating' => 1,
            'created_at' => now()->subMonths(2),
            'updated_at' => now()->subMonths(2),
        ]);

        $response = $this->get('/books?filter=popular_last_month');

        $response->assertOk();
        $response->assertSee('The Trending Book');
        $response->assertSee('★');
        $response->assertSee('☆');
        $response->assertSee('out of 3 reviews');
    }

    public function test_book_show_page_loads_the_book_model(): void
    {
        $book = Book::factory()->create([
            'title' => 'The Detail Book',
        ]);

        Review::factory()->for($book)->create([
            'rating' => 4,
        ]);

        $response = $this->get('/books/' . $book->id);

        $response->assertOk();
        $response->assertSee('The Detail Book');
        $response->assertSee('★');
        $response->assertSee('☆');
    }

    public function test_review_can_be_created_for_a_book(): void
    {
        $book = Book::factory()->create();

        $response = $this->post('/books/' . $book->id . '/reviews', [
            'review' => 'This review is long enough to pass.',
            'rating' => 4,
        ]);

        $response->assertRedirect('/books/' . $book->id);
        $this->assertDatabaseHas('reviews', [
            'book_id' => $book->id,
            'review' => 'This review is long enough to pass.',
            'rating' => 4,
        ]);
    }
}
