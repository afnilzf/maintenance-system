<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepairLogLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'repair_log_id',
        'part',
        'issue',
        'cause',
        'solution',
    ];

    public function repairLog()
    {
        return $this->belongsTo(RepairLog::class);
    }
}
