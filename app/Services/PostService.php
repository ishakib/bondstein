<?php

namespace App\Services;


use App\Repositories\Contracts\PostRepositoryInterface;

class PostService extends BaseService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        parent::__construct($postRepository);
    }
}
