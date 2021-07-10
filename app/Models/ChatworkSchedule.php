<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatworkSchedule extends Model
{
    protected $guarded = [];

    protected $table = 'chatwork_schedules';

    protected $fillable = [
        'user_id',
       	'group_id',
       	'time_number',
       	'message'
    ];
}