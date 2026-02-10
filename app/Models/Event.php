<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'category', 'date', 'location', 'description', 'image', 'status'];

    protected $casts = [
        'date' => 'datetime',
    ];
}
