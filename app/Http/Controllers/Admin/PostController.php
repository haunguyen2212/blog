<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Repositories\Admin\PostRepository;
use App\Repositories\Admin\PostTagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $post, $post_tag;

    public function __construct(
        PostRepository $postRepository,
        PostTagRepository $postTagRepository
    )
    {
        $this->post = $postRepository;
        $this->post_tag = $postTagRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try{
            $image = $request->file('image');
            $new_name = rand() .'.'. $image->getClientOriginalExtension();
            $image->move(public_path('front/img'), $new_name);
            DB::beginTransaction();
            $store = $this->post->create([
                'category_id' => $request->category,
                'title' => $request->title,
                'slug' => $request->slug,
                'introduction' => $request->introduction,
                'content' => $request->content,
                'author' => 1,
                'image' => $new_name,
                'created_by' => 1,
                'updated_by' => 1,
            ]);
            foreach ($request->tag as $tag_id){
                $this->post_tag->create([
                    'post_id' => $store->id,
                    'tag_id' => $tag_id,
                    'created_by' => 1,
                    'updated_by' => 1
                ]);
            }
            DB::commit();
            return response()->json(['status' => 1]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['status' => 0]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
