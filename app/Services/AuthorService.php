<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AuthorService extends AbstractService
{
    public function __construct(AuthorRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Stores a new author.
     *
     * @param Request $request
     *
     * @return Author
     */
    public function store(Request $request): Author
    {
        $autor = $this->validate($request);

        return $this->repository->store($autor);
    }

    /**
     * Updates the author.
     *
     * @param int     $id
     * @param Request $request
     *
     * @return Author
     */
    public function update(int $id, Request $request): Author
    {
        $autor = $this->validate($request);

        return $this->repository->update(array_merge(['id' => $id], $autor));
    }

    /**
     * Validates the form.
     *
     * @param Request $request
     *
     * @return array
     */
    public function validate(Request $request): array
    {
        return $request->validate([
            'name' => 'required|max:40',
        ]);;
    }

    /**
     * No pagination authors list.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }
}
