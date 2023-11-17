<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentService extends BaseService
{
    protected $repository;

    public function __construct(CommentRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }
}
