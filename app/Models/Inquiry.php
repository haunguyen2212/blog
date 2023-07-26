<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'inquiries';

    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'title',
        'content',
        'is_delete',
        'created_by',
        'updated_by'
    ];
}
