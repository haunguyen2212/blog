<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    private $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getTags($limit = 0, $paginate = 0){
        $query = $this->tag->where('is_delete', 0);
        if($limit){
            $query->take($limit);
        }
        return $paginate ? $query->get() : $query->paginate($paginate);
    }

    public function getById($id){
        return $this->tag->find($id);
    }

}