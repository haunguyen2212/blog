<?php

namespace App\Repositories;

use App\Models\TopPost;

class TopPostRepository
{
    protected $top_post;

    public function __construct(
        TopPost $top_post
    )
    {
        $this->top_post = $top_post;
    }

    public function getTopPost(){
        return $this->top_post->join('posts', 'posts.id', 'top_post.post_id')
                        ->join('categories', 'categories.id', 'posts.category_id')
                        ->where('top_post.is_delete', 0)
                        ->where('posts.is_public', 1)
                        ->where('posts.is_delete', 0)
                        ->select([
                            'posts.*',
                            'categories.name as category_name'
                        ])->orderBy('order', 'asc')
                        ->take(config('constant.MAX_POST_TOP'))
                        ->get();
    }
}