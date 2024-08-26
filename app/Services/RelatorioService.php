<?php

namespace App\Services;

use App\Repositories\RelatorioRepository;
use Illuminate\Support\Collection;

class RelatorioService
{
    public function __construct(readonly private RelatorioRepository $repository) {}

    /**
     * Relatóio de livros
     *
     * @return Collection
     */
    public function listar(): Collection
    {
        return $this->repository->listar();
    }
}
