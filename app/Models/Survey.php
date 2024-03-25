<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'surveys';

    protected $fillable = [
        'name',
        // 'slug',
        'description',
        'form_link',
        // 'meta_title',
        // 'meta_description',
        // 'meta_keywords',
        'crated_by',
        'cb_number',
    ];
}
