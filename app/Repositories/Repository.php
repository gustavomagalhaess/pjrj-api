<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Livro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    public function __construct(public readonly Model $model) {}

    /**
     * Listagem de registros.
     */
    public function listar(): LengthAwarePaginator
    {
        return $this->model::paginate(10);
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
        return $this->model::find($Cod);
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
        return $this->model::destroy($Cod);
    }

    abstract public function inserir(array $model): Model;
    abstract public function alterar(array $form): Model;
}
