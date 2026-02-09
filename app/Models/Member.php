<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'image',
        'status',
        'bio',
        'social_links',
    ];
}
