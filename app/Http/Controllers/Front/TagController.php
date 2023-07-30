<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tag;

    public function __construct(
        TagRepository $tagRepository
    )
    {
        $this->tag = $tagRepository;
    }

    public function index($tag_slug){
        $data['posts'] = $this->tag->getPostByTagSlug($tag_slug, 6);
        $data['tag'] = $this->tag->getBySlug($tag_slug);
        return view('front.tag', $data);
    }
}
