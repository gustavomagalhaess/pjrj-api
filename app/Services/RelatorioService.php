<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\RelatorioRepository;
use Illuminate\Support\Collection;

class RelatorioService
{
    public function __construct(readonly private RelatorioRepository $repository) {}

    /**
     * Listagem geral de livros com autores e assuntos.
     *
     * @return Collection
     */
    public function listar(): Collection
    {
        return $this->repository->listar();
    }

    /**
     * Listagem de quantidade de livros por autor.
     *
     * @return Collection
     */
    public function autores(): Collection
    {
        return $this->repository->autores();
    }

    /**
     * Listagem de quantidade de livros por assunto.
     *
     * @return Collection
     */
    public function assuntos(): Collection
    {
        return $this->repository->assuntos();
    }
}
