<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'introduction',
        'content',
        'image',
        'author',
        'is_public',
        'public_date',
        'is_delete',
        'created_by',
        'updated_by',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')
                    ->where('post_tags.is_delete', 0)
                    ->where('tags.is_delete', 0)
                    ->select('tags.id', 'tags.name');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id')
                    ->where('comments.is_delete', 0)
                    ->select('post_id', 'parent_id', 'user_id', 'user_name', 'content');
    }
}
