<?php

namespace App\Libraries;

class Common
{
    protected $post, $tag, $category;

    public function __construct()
    {
        $this->post = app('App\Repositories\PostRepository');
        $this->tag = app('App\Repositories\TagRepository');
        $this->category = app('App\Repositories\CategoryRepository');
    }

    public function getTags(){
        return $this->tag->getTags();
    }

    public function getRecentPost(){
        return $this->post->getRecentPost(5);
    }

    public function getCategories(){
        return $this->category->getCategories();
    }
}