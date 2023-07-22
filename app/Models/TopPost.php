<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopPost extends Model
{
    use HasFactory;

    protected $table = 'top_post';
    protected $fillable = [
        'post_id',
        'order',
        'is_delete',
        'created_by',
        'updated_by',
    ];
}
