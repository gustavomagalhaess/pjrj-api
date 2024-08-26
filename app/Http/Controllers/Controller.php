<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class Controller
{
    public function __construct(public readonly Service $service) {}

    /**
     * Listagem de registros.
     *
     * @return JsonResponse
     */
    public function listar(): JsonResponse
    {
        $response = $this->service->listar();

        return response()->json($response);
    }

    /**
     * Busca registro por Cod.
     *
     * @param int $Cod
     *
     * @return JsonResponse
     */
    public function buscar(int $Cod): JsonResponse
    {
        $response = $this->service->buscar($Cod);

        return response()->json($response);
    }

    /**
     * Cria um novo registro.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function inserir(Request $request): JsonResponse
    {
        $response = $this->service->inserir($request);

        return response()->json(['created' => true], 201);
    }

    /**
     * Altera o registro.
     *
     * @param int     $Cod
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function alterar(int $Cod, Request $request): JsonResponse
    {
        $response = $this->service->alterar($Cod, $request);

        return response()->json($response);
    }

    /**
     * Exclui registro por Cod.
     *
     * @param int $Cod
     *
     * @return JsonResponse
     */
    public function excluir(int $Cod): JsonResponse
    {
        $count = $this->service->excluir($Cod);

        return response()->json(['deleted' => $count > 0]);
    }
}
