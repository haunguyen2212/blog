<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

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

    public function getTopCategory(){
        return $this->model->with('limited_posts')
                        ->join('posts', 'categories.id', 'posts.category_id')
                        ->where('categories.is_delete', 0)
                        ->where('posts.is_delete', 0)
                        ->where('posts.is_public', 1)
                        ->orderBy('categories.id', 'asc')
                        ->select([
                            'categories.id',
                            'categories.name',
                            'categories.slug',
                            DB::raw('COUNT(posts.id) as number_post')
                        ])
                        ->groupBy([
                            'categories.id',
                            'categories.name',
                            'categories.slug',
                        ])
                        ->having('number_post', '>=', config('constant.MIN_POST_SHOW_CATEGORY'))
                        ->get();
    }

}