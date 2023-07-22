<?php

namespace App\Libraries;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Common
{

    public function getTags(){
        return Tag::where('is_delete', 0)->select('id', 'name')->take(config('constant.MAX_TAG'))->get();
    }

    public function getCategories(){
        return Category::where('is_delete', 0)->select('id', 'name')->take(config('constant.MAX_CATEGORY'))->get();
    }

    public function getTrendingPost(){
        return Post::leftJoin('post_views', 'posts.id', 'post_views.post_id')
            ->join('categories', 'categories.id', 'posts.category_id')
            ->join('users', 'users.id', 'posts.author')
            ->where('posts.is_delete', 0)
            ->where('posts.is_public', 1)
            ->groupBy([
                'posts.id',
                'posts.title',
                'posts.public_date',
                'categories.name',
                'users.name',
            ])
            ->select([
                'posts.id',
                'posts.title',
                'posts.public_date',
                'categories.name as category_name',
                'users.name as author_name',
                DB::raw('COUNT(post_views.id) as views')
            ])
            ->orderBy('views', 'desc')
            ->take(config('constant.MAX_POST_SIDEBAR'))
            ->get();
    }

    public function getLatestPost(){
        return Post::join('categories', 'categories.id', 'posts.category_id')
                    ->join('users', 'users.id', 'posts.author')
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->orderBy('posts.public_date', 'desc')
                    ->select([
                        'posts.id',
                        'posts.title',
                        'posts.public_date',
                        'categories.name as category_name',
                        'users.name as author_name'
                    ])
                    ->take(config('constant.MAX_POST_SIDEBAR'))
                    ->get();
    }
}