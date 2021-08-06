<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function getTimeUpdated()
    {
        return Carbon::parse($this->updated_at)->addHours(7)->format('Y-m-d H:i:s');
    }

    public function getAuthor()
    {
        if (empty($this->user_id)) {
            return 'ADMIN';
        }
        return $this->user->name;
    }
}
