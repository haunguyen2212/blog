<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    public function __construct(
        Category $category
    )
    {
        parent::__construct($category);
    }

    public function getCategories($limit = 0, $pagination = 0){
        $query = $this->model->where('is_delete', 0)
                    ->select(['id', 'name', 'slug']);
        if($limit){
            $query->take($limit);
        }
        return $pagination ? $query->paginate($pagination) : $query->get();
    }

    public function getPostAllCategory(){
        return $this->model->with('limited_posts')->where('is_delete', 0)->get();
    }

    public function getBySlug($slug){
        return $this->model->where('slug', $slug)->where('is_delete', 0)->firstOrFail();
    }

}