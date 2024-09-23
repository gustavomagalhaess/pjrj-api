<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Book;

use App\Repositories\RepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractService implements ServiceInterface
{
    public function __construct(protected readonly RepositoryInterface $repository) {}

    /**
     * Retrieves records list.
     */
    public function list(): LengthAwarePaginator
    {
        return $this->repository->list();
    }

    /**
     * Finds a record by id.
     *
     * @param int $id
     *
     * @return Book
     */
    public function find(int $id): Model
    {
        return $this->repository->find($id);
    }

    /**
     * Deletes a record by id.
     *
     * @param int $id
     *
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    /**
     * Searches an item by query.
     *
     * @param string $query
     *
     * @return mixed
     */
    public function search(string $query)
    {
        return $this->repository->search($query);
    }

    abstract public function store(Request $request);
    abstract public function update(int $id, Request $request);
}
