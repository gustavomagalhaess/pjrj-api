<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ReportRepository;
use Illuminate\Support\Collection;

class ReportService
{
    public function __construct(readonly private ReportRepository $repository) {}

    /**
     * Book's list with own authors and subjects.
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return $this->repository->list();
    }

    /**
     * Books per author list.
     *
     * @return Collection
     */
    public function authors(): Collection
    {
        return $this->repository->authors();
    }

    /**
     * Books per subject list.
     *
     * @return Collection
     */
    public function subjects(): Collection
    {
        return $this->repository->subjects();
    }
}
