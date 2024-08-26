<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Autor;
use Tests\TestCase;

class AutorControllerTest extends TestCase
{

    public function test_incluir_autor(): void
    {
        $autor = Autor::factory()->make();

        $response = $this->postJson('/api/autores', [
            'nome' => $autor['Nome'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_incluir_campos_em_branco(): void
    {
        $response = $this->postJson('/api/autores', [
            'nome' => '',
        ]);

        $response->assertInvalid([
            "nome" => "O campo nome é obrigatório.",
        ]);
    }
}
