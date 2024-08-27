<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Livro;

use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class Service implements ServiceInterface
{
    public function __construct(public readonly RepositoryInterface $repository) {}

    /**
     * Listagem de registros.
     */
    public function listar(): LengthAwarePaginator
    {
        return $this->repository->listar();
    }

    /**
     * Busca registro por Cod.
     *
     * @param int $Cod
     *
     * @return Livro
     */
    public function buscar(int $Cod): Model
    {
        return $this->repository->buscar($Cod);
    }

    /**
     * Exclui registro por Cod.
     *
     * @param int $Cod
     *
     * @return int
     */
    public function excluir(int $Cod): int
    {
        return $this->repository->excluir($Cod);
    }

    abstract public function inserir(Request $request);
    abstract public function alterar(int $Cod, Request $request);
}
