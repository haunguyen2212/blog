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

    public function index($id){
        $data['post'] = $this->post->getById($id);
        $data['comments'] = $this->comment->getComments($id);
        $data['number_comment'] = $this->comment->countComment($id);
        return view('front.post_detail', $data);
    }
}
