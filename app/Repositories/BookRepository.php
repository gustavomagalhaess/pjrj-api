<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookRepository extends AbstractRepository
{
    /**
     * Sets $this->model as Book.
     *
     * @param Book $book
     */
    public function __construct(Book $book)
    {
        parent::__construct($book);
    }

    /**
     * Stores a new book.
     *
     * @param array      $form
     * @param null|array $authors
     * @param null|array $subjects
     *
     * @return Book
     * @throws SaveException
     */
    public function store(array $form, ?array $authors = [], ?array $subjects = []): Book
    {
        try {
            DB::beginTransaction();

            $book = $this->model::create([
                'title' => $form['title'],
                'publisher' => $form['publisher'],
                'edition' => $form['edition'],
                'published_at' => $form['published_at'],
            ]);

            $this->syncAuthors($authors, $book);
            $this->syncSubjects($subjects, $book);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }


        return $book;
    }

    /**
     * Updates the book.
     *
     * @param array      $form
     * @param null|array $authors
     * @param null|array $subjects
     *
     * @return Book
     * @throws SaveException
     */
    public function update(array $form, ?array $authors = [], ?array $subjects = []): Book
    {
        try {
            DB::beginTransaction();

            $book = $this->model::find($form['id']);

            $book->title = $form['title'];
            $book->publisher = $form['publisher'];
            $book->edition = $form['edition'];
            $book->published_at = $form['published_at'];
            $book->save();

            $this->syncAuthors($authors, $book);
            $this->syncSubjects($subjects, $book);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }

        return $book;
    }

    /**
     * Syncs the book's authors.
     *
     * @param array $authors
     * @param            $book
     *
     * @return void
     */
    public function syncAuthors(array $authors, $book): void
    {
        if (! empty($authors)) {
            $book->authors()->sync($authors);
        }
    }

    /**
     * Syncs the book's subjects.
     *
     * @param array $subjects
     * @param            $book
     *
     * @return void
     */
    public function syncSubjects(array $subjects, $book): void
    {
        if (! empty($subjects)) {
            $book->subjects()->sync($subjects);
        }
    }
}
