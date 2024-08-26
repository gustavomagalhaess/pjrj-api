<?php

namespace App\Http\Controllers;

use App\Services\RelatorioService;
use Illuminate\Http\JsonResponse;

class RelatorioController
{
    public function __construct(private readonly RelatorioService $service){}

    /**
     * Download do relatório
     *
     * @return JsonResponse
     */
    public function listar(): JsonResponse
    {
        $livros = $this->service->listar();

        return response()->json($livros);
    }
}
