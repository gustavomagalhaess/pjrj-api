<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AssuntoService;
use Illuminate\Http\JsonResponse;

class AssuntoController extends Controller
{
    public function __construct(AssuntoService $service){
        parent::__construct($service);
    }

    /**
     * Listagem dos assuntos sem paginação.
     *
     * @return JsonResponse
     */
    public function todos(): JsonResponse
    {
        $assunto = $this->service->todos();

        return response()->json($assunto);
    }
}
