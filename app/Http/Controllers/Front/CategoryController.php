<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->category = $categoryRepository;
    }

    public function index(){
        $data['categories'] = $this->category->getPostAllCategory();
        return view('front.category_all', $data);
    }
}
