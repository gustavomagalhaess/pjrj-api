<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RelatorioRepository
{
    /**
     * Listagem geral de livros com autores e assuntos.
     *
     * @return Collection
     */
    public function listar(): Collection
    {
        return DB::table('Relatorio')->get();
    }

    /**
     * Listagem de quantidade de livros por autor.
     *
     * @return Collection
     */
    public function autores(): Collection
    {
        return DB::table('Relatorio_Autor')->get();
    }

    /**
     * Listagem de quantidade de livros por assunto.
     *
     * @return Collection
     */
    public function assuntos(): Collection
    {
        return DB::table('Relatorio_Assunto')->get();
    }
}
