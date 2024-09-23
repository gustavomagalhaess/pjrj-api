<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\SaveException;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SubjectRepository extends AbstractRepository
{
    /**
     * Sets $this->model as Subject.
     *
     * @param Subject $subject
     */
    public function __construct(Subject $subject)
    {
        parent::__construct($subject);
    }

    /**
     * Stores a new subject.
     *
     * @param array $form
     *
     * @return Subject
     * @throws SaveException
     */
    public function store(array $form): Subject
    {
        try {
            DB::beginTransaction();

            $subject = Subject::create([
                'description' => $form['description'],
            ]);

            DB::commit();

            return $subject;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * Updates the subject.
     *
     * @param array $form
     *
     * @return Subject
     * @throws SaveException
     */
    public function update(array $form): Subject
    {
        try {
            DB::beginTransaction();

            $subject = Subject::find($form['id']);
            $subject->description = $form['description'];
            $subject->save();

            DB::commit();

            return $subject;
        } catch (\Throwable $e) {
            DB::rollBack();
            throw new SaveException();
        }
    }

    /**
     * No pagination subject list.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model::all();
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
        return $this->model::where('description', 'like', "%$query%")->get();
    }
}
