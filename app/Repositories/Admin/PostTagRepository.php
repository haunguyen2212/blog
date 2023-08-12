<?php

namespace App\Repositories\Admin;

use App\Models\PostTag;
use App\Repositories\BaseRepository;

class PostTagRepository extends BaseRepository
{

     public function __construct(PostTag $post_tag)
     {
          parent::__construct($post_tag);
     }

}