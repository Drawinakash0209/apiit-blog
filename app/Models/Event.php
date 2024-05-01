<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'events_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'type_of_event', 
        'location', 
        'start_time',
        'status',
        'created_by',
        'image'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
    
}
