<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Post());
    }
}
