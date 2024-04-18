<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'post_id',
        'student_id'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    // public function user(){
    //     return $this->belongsTo(Student::class);
    // }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
