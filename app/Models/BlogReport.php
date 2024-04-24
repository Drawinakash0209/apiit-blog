<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'issue_type', 'title', 'description'];

    //Relationships
    
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
