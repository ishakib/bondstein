<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->all();
        return response()->json(['posts' => $posts]);
    }
    public function store(PostRequest $request)
    {
        $createdItem = $this->service->create($request->validated());
        return response()->json(['message' => 'Post created successfully', 'data' => new PostResource($createdItem)], 201);
    }

    public function show(Post $dynamicModel)
    {
        return response()->json(['data' => new PostResource($dynamicModel)], 200);
    }

    public function update(PostRequest $request, $id)
    {
        $updatedItem = $this->postService->update($id, $request->validated());
        if (!$updatedItem) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json(['message' => 'Post updated successfully', 'data' => new PostResource($updatedItem)], 200);
    }

    public function destroy(Post $dynamicModel): JsonResponse
    {
        $deleted = $this->postService->delete($dynamicModel->id);

        if (!$deleted) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
