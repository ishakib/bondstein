<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(): JsonResponse
    {
        $posts = $this->postService->all();
        return response()->json(['posts' => $posts]);
    }

    public function show(Post $post): JsonResponse
    {
        return response()->json(['data' => $post], 200);
    }

    public function store(PostRequest $request): JsonResponse
    {
        $postData = $request->validated();
        $post = $this->postService->create($postData);

        return response()->json(['post' => $post], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $postData = $request->all();
        $post = $this->postService->update($id, $postData);

        return response()->json(['post' => $post]);
    }

    public function destroy($id): JsonResponse
    {
        $this->postService->delete($id);

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
