<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'anonymous', // Add 'anonymous' field
        'user_id',
        // 'email',
        'content',
        'is_reviewed',



    ];
    //feedback belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
