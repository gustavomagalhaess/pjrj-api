<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AutorService;
use Illuminate\Http\JsonResponse;

class AutorController extends Controller
{
    public function __construct(AutorService $service){
        parent::__construct($service);
    }

    /**
     * Listagem dos autores sem paginação.
     *
     * @return JsonResponse
     */
    public function todos(): JsonResponse
    {
        $autores = $this->service->todos();

        return response()->json($autores);
    }
}
