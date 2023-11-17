<?php

namespace App\Http\Controllers;

use App\Models\Shakib;
use App\Http\Requests\ShakibRequest;
use App\Services\ShakibService;
use Illuminate\Http\Request;

class ShakibController extends Controller
{
    protected $service;

    public function __construct(ShakibService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->latest()->paginate(request()->get('per_page', 10));
    }
    public function store(ShakibRequest $request)
    {
        $createdItem = $this->service->create($request->validated());
        return response()->json(['message' => 'Shakib created successfully', 'data' => new ShakibResource($createdItem)], 201);
    }

    public function show(Shakib $dynamicModel)
    {
        return response()->json(['data' => new ShakibResource($dynamicModel)], 200);
    }

    public function update(ShakibRequest $request, $id)
    {
        $updatedItem = $this->service->update($id, $request->validated());

        if (!$updatedItem) {
            return response()->json(['message' => 'Shakib not found'], 404);
        }

        return response()->json(['message' => 'Shakib updated successfully', 'data' => new ShakibResource($updatedItem)], 200);
    }

    public function destroy(Shakib $dynamicModel)
    {
        $deleted = $dynamicModel->delete();

        if (!$deleted) {
            return response()->json(['message' => 'Shakib not found'], 404);
        }

        return response()->json(['message' => 'Shakib deleted successfully'], 200);
    }
}
