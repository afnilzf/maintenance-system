<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarSchedule extends Model
{
    //
    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];
}
