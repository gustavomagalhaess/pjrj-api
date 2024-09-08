<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Subject;
use App\Repositories\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SubjectService extends AbstractService
{
    public function __construct(SubjectRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * Stores a new subject.
     *
     * @param Request $request
     *
     * @return Subject
     */
    public function store(Request $request): Subject
    {
        $assunto = $this->validate($request);

        return $this->repository->store($assunto);
    }

    /**
     * Updates the subject.
     *
     * @param int     $id
     * @param Request $request
     *
     * @return Subject
     */
    public function update(int $id, Request $request): Subject
    {
        $assunto = $this->validate($request);

        return $this->repository->update(array_merge(['id' => $id], $assunto));
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
            'description' => 'required|max:20',
        ]);
    }

    /**
     * No pagination subjects list.
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repository->all();
    }
}
