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
        'name',
        'is_publish'
    ];

    // attributes
    public function getPublishText()
    {
        return $this->getIsPublish() ? 'Công khai' : 'Ẩn';
    }

    public function getIsPublish()
    {
        return $this->is_publish == 1;
    }

    // scope
     public function scopePublish($query)
    {
        return $query->where('is_publish', true);
    }
}
