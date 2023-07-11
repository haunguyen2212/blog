<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    private $post;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->post = $postRepository;
    }

    public function index($id){
        $data['post'] = $this->post->getById($id);
        return view('front.post_detail', $data);
    }
}
