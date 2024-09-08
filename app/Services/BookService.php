<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Book;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BookService extends AbstractService
{
    public function __construct(BookRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Stores a new book.
     *
     * @param Request $request
     *
     * @return Book
     */
    public function store(Request $request): Book
    {
        [$book, $authors, $subjects] = $this->validate($request);

        return $this->repository->store($book, $authors, $subjects);
    }

    /**
     * Updates the book.
     *
     * @param int     $id
     * @param Request $request
     *
     * @return Book
     */
    public function update(int $id, Request $request): Book
    {
        [$book, $authors, $subjects] = $this->validate($request);

        return $this->repository->update(array_merge(['id' => $id], $book), $authors, $subjects);
    }

    /**
     * Validates the form.
     *
     * @param Request $request
     *
     * @return array
     */
    private function validate(Request $request): array
    {
        $book = $request->validate([
            'title' => 'required|max:40',
            'publisher' => 'required|max:40',
            'edition' => 'required',
            'published_at' => 'required|digits:4',
        ]);

        $authors = $this->retrieveIds($request, 'authors');
        $subjects = $this->retrieveIds($request, 'subjects');

        return [$book, $authors, $subjects];
    }

    /**
     * Retrieves the ids from the array form.
     *
     * @param Request $request
     * @param string  $fieldName
     *
     * @return array
     */
    private function retrieveIds(Request $request, string $fieldName): array
    {
        $$fieldName = [];

        if (!empty($request->get($fieldName))) {
            $$fieldName = Arr::pluck($request->get($fieldName), 'id');
        }

        return $$fieldName;
    }
}
