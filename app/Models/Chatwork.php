<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chatwork extends Model
{
    protected $guarded = [];

    protected $table = 'chatworks';

    protected $fillable = [
        'user_id',
       	'token'
    ];
}