<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\DeleteException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class AbstractRepository implements RepositoryInterface
{
    public function __construct(protected readonly Model $model) {}

    /**
     * Retrieves records list.
     *
     * @return LengthAwarePaginator
     */
    public function list(): LengthAwarePaginator
    {
        return $this->model::paginate(10);
    }

    /**
     * Finds a record by id.
     *
     * @param int $id
     *
     * @return Model
     */
    public function find(int $id): Model
    {
        return $this->model::find($id);
    }

    /**
     * Deletes a record by id.
     *
     * @param int $id
     *
     * @return int
     * @throws DeleteException
     */
    public function delete(int $id): int
    {
        try {
            DB::beginTransaction();

            $count = $this->model::destroy($id);

            DB::commit();

            return $count;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new DeleteException();
        }
    }

    abstract public function store(array $form): Model;
    abstract public function update(array $form): Model;
}
