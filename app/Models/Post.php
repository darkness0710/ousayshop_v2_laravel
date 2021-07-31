<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $table = 'posts';

    protected $fillable = [
        'slug',
        'type',
        'content',
        'user_id',
        'name'
    ];
}
