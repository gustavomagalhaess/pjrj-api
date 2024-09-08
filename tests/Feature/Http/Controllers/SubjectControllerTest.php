<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Subject;
use Tests\TestCase;

class SubjectControllerTest extends TestCase
{

    public function test_store_subject(): void
    {
        $assunto = Subject::factory()->make();

        $response = $this->postJson('/api/subjects', [
            'description' => $assunto['description'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_store_blank_fields(): void
    {
        $response = $this->postJson('/api/subjects', [
            'description' => '',
        ]);

        $response->assertInvalid([
            "description" => "The description field is required.",
        ]);
    }
}
