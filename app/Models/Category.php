<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'is_delete',
        'created_by',
        'updated_by'
    ];

    public function limited_posts(){
        return $this->hasMany(Post::class, 'category_id')
                ->join('users', 'users.id', 'posts.author')
                ->where('posts.is_delete', 0)
                ->where('posts.is_public', 1)
                ->orderBy('posts.public_date', 'desc')
                ->select([
                    'posts.*',
                    'users.name as author_name'
                ])
                ->take(config('constant.MAX_POST_CATEGORY'));
    }
}
