<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Repositories\TopPostRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $post, $tag, $top_post;

    public function __construct(
        PostRepository $postRepository,
        TopPostRepository $topPostRepository,
        TagRepository $tagRepository
    )
    {
        $this->post = $postRepository;
        $this->top_post = $topPostRepository;
        $this->tag = $tagRepository;
    }

    public function index(){
        $data['top_post'] = $this->top_post->getTopPost();
        $data['trending'] = $this->post->getTopTrending(config('constant.TOP_TRENDING'));
        $data['posts'] = $this->post->getPosts(config('constant.PAGINATION_FRONT'));
        return view('front.home', $data);
    }
}
