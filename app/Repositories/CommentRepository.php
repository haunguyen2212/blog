<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    protected $comment;

    public function __construct(
        Comment $comment
    )
    {
        $this->comment = $comment;
    }
    
    public function getComments($post_id, $limit = 0, $pagination = 0){
        $query = $this->comment->with('node_comments')
                        ->where('post_id', $post_id)
                        ->whereNull('parent_id')
                        ->where('is_delete', 0);
        if($limit){
            $query->take($limit);
        }
        return $pagination ? $query->paginate($pagination) : $query->get();
    }

    public function countComment($post_id){
        return $this->comment->where('post_id', $post_id)
                            ->where('is_delete', 0)
                            ->count();
    }
}