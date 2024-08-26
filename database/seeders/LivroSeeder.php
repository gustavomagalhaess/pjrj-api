<?php

namespace Database\Seeders;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livro::factory(20)->create();

        $livros = Livro::all();
        $autores = Autor::all();
        $assuntos = Assunto::all();

        foreach ($livros as $livro) {
            $rand = rand(1, 4);
            foreach ($autores->chunk($rand) as $autores_chunk) {
                $CodAus = $autores_chunk->pluck('CodAu');
                $livro->autores()->sync($CodAus);
            }
            $rand = rand(1, 4);
            foreach ($assuntos->chunk($rand) as $assuntos_chunk) {
                $CodAss = $assuntos_chunk->pluck('CodAs');
                $livro->assuntos()->sync($CodAss);
            }
        }
    }
}
