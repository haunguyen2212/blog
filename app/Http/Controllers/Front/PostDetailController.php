<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostDetailController extends Controller
{
    private $post, $comment;

    public function __construct(
        PostRepository $postRepository,
        CommentRepository $commentRepository
    )
    {
        $this->post = $postRepository;
        $this->comment = $commentRepository;
    }

    public function index($slug){
        $post = $this->post->getBySlug($slug);
        $data['post'] = $post;
        $data['comments'] = $this->comment->getComments($post->id);
        $data['number_comment'] = $this->comment->countComment($post->id);
        return view('front.post_detail', $data);
    }
}
