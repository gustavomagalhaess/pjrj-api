<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Author;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    public function test_store_author(): void
    {
        $author = Author::factory()->make();

        $response = $this->postJson('/api/authors', [
            'name' => $author['name'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_store_blank_fields(): void
    {
        $response = $this->postJson('/api/authors', [
            'name' => '',
        ]);

        $response->assertInvalid([
            "name" => "The name field is required.",
        ]);
    }
}
