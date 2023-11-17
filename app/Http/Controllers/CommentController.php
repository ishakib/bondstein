<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
class CommentController extends Controller
{
    protected $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json(['posts' => $this->service->all()]);
    }
    public function store(CommentRequest $request): JsonResponse
    {
        $post = $this->service->create($request->validated());

        return response()->json(['post' => $post], 201);
    }

    public function show(Comment $dynamicModel):JsonResponse
    {
        return response()->json(['data' => $dynamicModel], 200);
    }

    public function update(CommentRequest $request, Comment $dynamicModel)
    {
        $updatedItem = $this->service->update($dynamicModel->id, $request->validated());
        if (!$updatedItem) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json(['message' => 'Comment updated successfully', 'data' => new CommentResource($updatedItem)], 200);
    }

    public function destroy(Comment $dynamicModel): JsonResponse
    {
        $deleted = $this->service->delete($dynamicModel->id);

        if (!$deleted) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
