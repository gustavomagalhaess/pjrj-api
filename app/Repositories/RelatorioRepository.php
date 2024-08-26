<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RelatorioRepository
{
    /**
     * Relatório de livros.
     *
     * @return Collection
     */
    public function listar(): Collection
    {
        return DB::table('Relatorio')->get();
    }
}
