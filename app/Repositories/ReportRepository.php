<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ReportRepository
{
    /**
     * Book's list with own authors and subjects.
     *
     * @return Collection
     */
    public function list(): Collection
    {
        return DB::table('report')->get();
    }

    /**
     * Books per author list.
     *
     * @return Collection
     */
    public function authors(): Collection
    {
        return DB::table('author_report')->get();
    }

    /**
     * Books per subject list.
     *
     * @return Collection
     */
    public function subjects(): Collection
    {
        return DB::table('subject_report')->get();
    }
}
