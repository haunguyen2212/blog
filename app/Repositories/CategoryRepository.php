<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(
        Category $category
    )
    {
        $this->category = $category;
    }

    public function getCategories($limit = 0, $pagination = 0){
        $query = $this->category->where('is_delete', 0)
                    ->select(['id', 'name', 'slug']);
        if($limit){
            $query->take($limit);
        }
        return $pagination ? $query->paginate($pagination) : $query->get();
    }

    public function getPostAllCategory(){
        return $this->category->with('limited_posts')->where('is_delete', 0)->get();
    }

    public function getBySlug($slug){
        return $this->category->where('slug', $slug)->firstOrFail();
    }

}