<?php

namespace App\Repositories\Admin;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{

     public function __construct(Post $post)
     {
          parent::__construct($post);
     }

}