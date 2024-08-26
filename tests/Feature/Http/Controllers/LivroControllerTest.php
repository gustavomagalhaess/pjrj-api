<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Livro;
use Tests\TestCase;

class LivroControllerTest extends TestCase
{

    public function test_incluir_livro(): void
    {
        $livro = Livro::factory()->make();

        $response = $this->postJson('/api/livros', [
            'titulo' => $livro['Titulo'],
            'editora' => $livro['Editora'],
            'edicao' => $livro['Edicao'],
            'publicacao' => $livro['AnoPublicacao'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_incluir_campos_em_branco(): void
    {
        $response = $this->postJson('/api/livros', [
            'titulo' => '',
            'editora' => '',
            'edicao' => '',
            'publicacao' => ' ',
        ]);

        $response->assertInvalid([
            "titulo" => "O campo titulo é obrigatório.",
            "editora" => "O campo editora é obrigatório.",
            "edicao" => "O campo edicao é obrigatório.",
            "publicacao" => "O campo publicacao é obrigatório."
        ]);
    }
}
