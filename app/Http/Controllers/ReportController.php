<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\JsonResponse;

class ReportController
{
    public function __construct(private readonly ReportService $service){}

    /**
     * Book's list with own authors and subjects.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        return response()->json($this->service->list());
    }

    /**
     * Books per author list.
     *
     * @return JsonResponse
     */
    public function authors(): JsonResponse
    {
        return response()->json($this->service->authors());
    }

    /**
     * Books per subject list.
     *
     * @return JsonResponse
     */
    public function subjects(): JsonResponse
    {
        return response()->json($this->service->subjects());
    }
}
