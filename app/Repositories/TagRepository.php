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

    public function getById($id){
        return $this->tag->find($id);
    }

}