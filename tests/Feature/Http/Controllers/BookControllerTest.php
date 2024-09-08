<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Book;
use Tests\TestCase;

class BookControllerTest extends TestCase
{

    public function test_store_book(): void
    {
        $book = Book::factory()->make();

        $response = $this->postJson('/api/books', [
            'title' => $book['title'],
            'publisher' => $book['publisher'],
            'edition' => $book['edition'],
            'published_at' => $book['published_at'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_store_blank_fields(): void
    {
        $response = $this->postJson('/api/books', [
            'title' => '',
            'publisher' => '',
            'edition' => '',
            'publish_at' => ' ',
        ]);

        $response->assertInvalid([
            'title' => 'The title field is required.',
            'publisher' => 'The publisher field is required.',
            'edition' => 'The edition field is required.',
            'published_at' => 'The published at field is required.'
        ]);
    }
}
