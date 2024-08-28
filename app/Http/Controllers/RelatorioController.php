<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\RelatorioService;
use Illuminate\Http\JsonResponse;

class RelatorioController
{
    public function __construct(private readonly RelatorioService $service){}

    /**
     * Listagem geral de livros com autores e assuntos.
     *
     * @return JsonResponse
     */
    public function listar(): JsonResponse
    {
        $livros = $this->service->listar();

        return response()->json($livros);
    }

    /**
     * Listagem de quantidade de livros por autor.
     *
     * @return JsonResponse
     */
    public function autores(): JsonResponse
    {
        $livros = $this->service->autores();

        return response()->json($livros);
    }

    /**
     * Listagem de quantidade de livros por assunto.
     *
     * @return JsonResponse
     */
    public function assuntos(): JsonResponse
    {
        $livros = $this->service->assuntos();

        return response()->json($livros);
    }
}
