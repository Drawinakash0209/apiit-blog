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
        'created_by',
        'tags'


    ];

    public function scopeFilters($query, array $filter){
        if($filter['tag'] ?? false){
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };
    }

    //Relationships
    
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'created_by');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    //report
    public function reports(){
        return $this->hasMany(BlogReport::class);
    }

}
