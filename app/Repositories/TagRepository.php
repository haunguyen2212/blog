<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository extends BaseRepository
{

    public function __construct(Tag $tag)
    {
        parent::__construct($tag);
    }

    public function getPostByTagSlug($tag_slug, $pagination = 0){
        $query = $this->model->join('post_tags', 'tags.id', 'post_tags.tag_id')
                        ->join('posts', 'posts.id', 'post_tags.post_id')
                        ->join('users', 'users.id', 'posts.author')
                        ->join('categories', 'categories.id', 'posts.category_id')
                        ->where('tags.slug', $tag_slug)
                        ->where('post_tags.is_delete', 0)
                        ->where('posts.is_delete', 0)
                        ->where('posts.is_public', 1)
                        ->where('tags.is_delete', 0)
                        ->select([
                            'posts.*',
                            'users.name as author_name',
                            'categories.name as category_name'
                        ]);
        return $pagination ? $query->paginate($pagination) : $query->get();
    }

    public function getBySlug($slug){
        return $this->model->where('slug', $slug)->where('is_delete', 0)->firstOrFail();
    }

}