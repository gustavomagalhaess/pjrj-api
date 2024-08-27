<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\DeleteException;
use App\Models\Livro;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class Repository implements RepositoryInterface
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
     * @throws DeleteException
     */
    public function excluir(int $Cod): int
    {
        try {
            DB::beginTransaction();

            $count = $this->model::destroy($Cod);

            DB::commit();

            return $count;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new DeleteException();
        }
    }

    abstract public function inserir(array $model): Model;
    abstract public function alterar(array $form): Model;
}
