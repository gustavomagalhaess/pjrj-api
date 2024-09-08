<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class AbstractController implements ControllerInterface
{
    public function __construct(public readonly ServiceInterface $service) {}

    /**
     * Retrieves records list.
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $response = $this->service->list();

        return response()->json($response);
    }

    /**
     * Finds a record by id.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function find(int $id): JsonResponse
    {
        $response = $this->service->find($id);

        return response()->json($response);
    }

    /**
     * Stores a new record.
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $this->service->store($request);

        return response()->json(['created' => true], 201);
    }

    /**
     * Updates the record.
     *
     * @param int     $id
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(int $id, Request $request): JsonResponse
    {
        $this->service->update($id, $request);

        return response()->json(['updated' => true]);
    }

    /**
     * Deletes a record by id.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $count = $this->service->delete($id);

        return response()->json(['deleted' => $count > 0]);
    }
}
