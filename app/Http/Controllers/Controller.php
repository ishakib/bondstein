<?php

namespace App\Http\Controllers;

use App\Models\;
use App\Http\Requests\Request;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Controller extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $posts = $this->service->all();
        return response()->json(['posts' => $posts]);
    }
    public function store(Request $request): JsonResponse
    {
        $post = $this->service->create($request->validated());

        return response()->json(['post' => $post], 201);
    }

    public function show( $dynamicModel): JsonResponse
    {
        return response()->json(['data' => $dynamicModel], 200);
    }

    public function update(Request $request,  $dynamicModel): JsonResponse
    {
        $updatedItem = $this->service->update($dynamicModel->id, $request->validated());
        if (!$updatedItem) {
            return response()->json(['message' => ' not found'], 404);
        }

        return response()->json(['message' => ' updated successfully', 'data' => new Resource($updatedItem)], 200);
    }

    public function destroy( $dynamicModel): JsonResponse
    {
        $deleted = $this->service->delete($dynamicModel->id);

        if (!$deleted) {
            return response()->json(['message' => ' not found'], 404);
        }

        return response()->json(['message' => ' deleted successfully'], 200);
    }
}
