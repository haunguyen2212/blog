<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category, $post;

    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    )
    {
        $this->category = $categoryRepository;
        $this->post = $postRepository;
    }

    public function index(){
        $data['categories'] = $this->category->getPostAllCategory();
        return view('front.category_all', $data);
    }

    public function show($slug){
        $data['category'] = $this->category->getBySlug($slug);
        $data['posts'] = $this->post->getByCategorySlug($slug, 6);
        return view('front.category', $data);
    }
}
