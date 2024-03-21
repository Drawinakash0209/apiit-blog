<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'v_iframe',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'image',
        'status',
        'created_by'
        

    ];
}
