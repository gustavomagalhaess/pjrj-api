<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Assunto;
use Tests\TestCase;

class AssuntoControllerTest extends TestCase
{

    public function test_incluir_assunto(): void
    {
        $assunto = Assunto::factory()->make();

        $response = $this->postJson('/api/assuntos', [
            'descricao' => $assunto['Descricao'],
        ]);

        $response->assertStatus(201)
            ->assertJson(['created' => true]);
    }

    public function test_incluir_campos_em_branco(): void
    {
        $response = $this->postJson('/api/assuntos', [
            'descricao' => '',
        ]);

        $response->assertInvalid([
            "descricao" => "O campo descricao é obrigatório.",
        ]);
    }
}
