<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $post;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->post = $postRepository;
    }

    public function index(Request $request){
        $data['posts'] = $this->post->getByTitle($request->keyword ?? '', 6);
        return view('front.search', $data);
    }
}
