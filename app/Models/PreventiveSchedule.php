<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreventiveSchedule extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'period_week',
        'period',
        'realisasi_week',
        'period_realisasi',
        'description',
        'approval_status',
        'approved_by_head',
        'approved_by_department',
        'created_by',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
