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
          $query = $this->post->with('tags')
                    ->join('users', 'users.id', 'posts.author')
                    ->where('is_delete', 0)
                    ->where('is_public', 1)
                    ->select([
                         'posts.*', 
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
                    ->select([
                         'posts.*',
                         'users.name as author_name'
                    ])
                    ->where('is_delete', 0)
                    ->where('is_public', 1)
                    ->findOrFail($id);
     }
}
