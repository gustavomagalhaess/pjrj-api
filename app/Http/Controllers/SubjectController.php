<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\SubjectService;
use Illuminate\Http\JsonResponse;

class SubjectController extends AbstractController
{
    public function __construct(SubjectService $service){
        parent::__construct($service);
    }

    /**
     * No pagination subjects list.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json($this->service->all());
    }
}
