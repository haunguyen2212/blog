<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends BaseRepository
{

    public function __construct(
        Comment $comment
    )
    {
        parent::__construct($comment);
    }
    
    public function getComments($post_id, $limit = 0, $pagination = 0){
        $query = $this->model->with('node_comments')
                        ->where('post_id', $post_id)
                        ->whereNull('parent_id')
                        ->where('is_delete', 0)
                        ->orderBy('created_at', 'desc');
        if($limit){
            $query->take($limit);
        }
        return $pagination ? $query->paginate($pagination) : $query->get();
    }

    public function countComment($post_id){
        return $this->model->where('post_id', $post_id)
                            ->where('is_delete', 0)
                            ->count();
    }
}