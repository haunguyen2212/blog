<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $post, $tag;

    public function __construct(
        PostRepository $postRepository,
        TagRepository $tagRepository
    )
    {
        $this->post = $postRepository;
        $this->tag = $tagRepository;
    }

    public function index(){
        $data['posts'] = $this->post->getPosts(5);
        return view('front.home', $data);
    }
}
