<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{

     public function __construct(Post $post)
     {
          parent::__construct($post);
     }

     public function getPosts($limit = 0, $orderBy = 'id', $orderType = 'asc', $pagination = 0){
          $query = $this->model->with(['tags', 'comments'])
                    ->join('users', 'users.id', 'posts.author')
                    ->join('categories', 'categories.id', 'posts.category_id')
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->select([
                         'posts.*', 
                         'categories.name as category_name',
                         'users.name as author_name'
                    ])
                    ->orderBy($orderBy, $orderType);
          if($limit){
               $query->take($limit);
          }
          return $pagination ? $query->paginate($pagination) : $query->get();
     }

     public function getById($id){
          return $this->model->with('tags')
                    ->join('users', 'users.id', 'posts.author')
                    ->join('categories', 'categories.id', 'posts.category_id')
                    ->select([
                         'posts.*',
                         'categories.name as category_name',
                         'users.name as author_name'
                    ])
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->findOrFail($id);
     }

     public function getBySlug($slug){
          return $this->model->with('tags')
                    ->join('users', 'users.id', 'posts.author')
                    ->join('categories', 'categories.id', 'posts.category_id')
                    ->select([
                         'posts.*',
                         'categories.name as category_name',
                         'users.name as author_name'
                    ])
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->where('posts.slug', $slug)
                    ->firstOrFail();
     }

     public function getByCategorySlug($category_slug, $pagination = 0){
          $query = $this->model->join('users', 'users.id', 'posts.author')
                    ->join('categories', 'categories.id', 'posts.category_id')
                    ->select([
                         'posts.*',
                         'categories.name as category_name',
                         'categories.slug as category_slug',
                         'users.name as author_name'
                    ])
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->where('categories.slug', $category_slug)
                    ->orderBy('posts.public_date', 'desc');
          return $pagination ? $query->paginate($pagination) : $query->get();
     }

     public function getTopTrending($limit){
          return $this->model->leftJoin('post_views', 'posts.id', 'post_views.post_id')
                         ->join('users', 'users.id', 'posts.author')
                         ->where('posts.is_delete', 0)
                         ->where('posts.is_public', 1)
                         ->groupBy([
                              'posts.id',
                              'posts.slug',
                              'posts.title',
                              'users.name',
                         ])
                         ->select([
                              'posts.id',
                              'posts.slug',
                              'posts.title',
                              'users.name as author_name',
                              DB::raw('COUNT(post_views.id) as views')
                         ])
                         ->orderBy('views', 'desc')
                         ->take($limit)
                         ->get();
     }

     public function getByTitle($keyword = '', $pagination = 0){
          $query = $this->model->join('users', 'users.id', 'posts.author')
                    ->join('categories', 'categories.id', 'posts.category_id')
                    ->select([
                         'posts.*',
                         'categories.name as category_name',
                         'categories.slug as category_slug',
                         'users.name as author_name'
                    ])
                    ->where('posts.is_delete', 0)
                    ->where('posts.is_public', 1)
                    ->where('posts.title', 'LIKE' ,'%'.$keyword.'%')
                    ->orderBy('posts.public_date', 'desc');
          return $pagination ? $query->paginate($pagination) : $query->get();
     }
}
