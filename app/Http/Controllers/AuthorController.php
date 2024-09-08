<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;

class AuthorController extends AbstractController
{
    public function __construct(AuthorService $service){
        parent::__construct($service);
    }

    /**
     * No pagination authors list.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json($this->service->all());
    }
}
