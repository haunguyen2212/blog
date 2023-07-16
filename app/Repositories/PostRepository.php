<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
     private $post;

     public function __construct(Post $post)
     {
          $this->post = $post;
     }

     public function getPosts($limit = 0, $orderBy = 'id', $orderType = 'asc', $pagination = 0){
          $query = $this->post->with(['tags', 'comments'])
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
          return $pagination ? $query->get() : $query->paginate($pagination);
     }

     public function getRecentPost($limit = 0){
          $query = $this->post->where('is_delete', 0)
                    ->where('is_public', 1)
                    ->orderBy('public_date', 'desc')
                    ->select([
                         'posts.id',
                         'posts.title',
                         'posts.public_date'
                    ]);
          if($limit){
               $query->take($limit);
          }
          return  $query->get();
     }

     public function getById($id){
          return $this->post->with('tags')
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
}
