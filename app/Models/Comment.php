<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'parent_id',
        'user_id',
        'user_name',
        'content',
        'is_delete',
        'created_by',
        'updated_by'
    ];

    public function node_comments(){
        return $this->hasMany(Comment::class, 'parent_id', 'id')->where('is_delete', 0);
    }
}
