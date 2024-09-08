<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Author;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class AuthorRepository extends AbstractRepository
{
    /**
     * Sets $this->model as Author.
     *
     * @param Author $author
     */
    public function __construct(Author $author)
    {
        parent::__construct($author);
    }

    /**
     * Stores a new author.
     *
     * @param array $form
     *
     * @return Author
     * @throws SaveException
     */
    public function store(array $form): Author
    {
        try {
            DB::beginTransaction();

            $author = $this->model::create([
                'name' => $form['name'],
            ]);

            DB::commit();

            return $author;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * Updates the author.
     *
     * @param array $form
     *
     * @return Author
     * @throws SaveException
     */
    public function update(array $form): Author
    {
        try {
            DB::beginTransaction();

            $autor = $this->model::find($form['id']);

            $autor->name = $form['name'];
            $autor->save();

            DB::commit();

            return $autor;

        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * No pagination authors list.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model::all();
    }
}
