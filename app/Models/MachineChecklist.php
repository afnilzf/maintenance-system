<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineChecklist extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'schedule_id',
        'checked_by',
        'checked_at',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function schedule()
    {
        return $this->belongsTo(MaintenanceRequest::class, 'schedule_id');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function lines()
    {
        return $this->hasMany(MachineChecklistLine::class);
    }
}
