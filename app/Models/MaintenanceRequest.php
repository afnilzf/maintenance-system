<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'created_by',
        'period_week',
        'period_month',
        'period_year',
        'realization_week',
        'realization_month',
        'realization_year',
        'interval_month',
        'cycle_type',
        'damage_type',
        'description',
        'approval_status',
        'approved_by_department',
        'approved_by_user',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by_user');
    }

    public function checklist()
    {
        return $this->hasOne(\App\Models\MachineChecklist::class, 'schedule_id');
    }
}
