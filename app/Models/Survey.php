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
        'description',
        'form_link',
        'crated_by',
        'cb_number',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'crated_by');
    }


    
    // public function student(){
    //     return $this->belongsTo(Student::class, 'crated_by');
    // }
}
