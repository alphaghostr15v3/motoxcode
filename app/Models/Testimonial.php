<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'content', 'message', 'role', 'image', 'is_active', 'rating'];
}
