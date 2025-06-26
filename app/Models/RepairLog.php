<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepairLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'repaired_by',
        'repair_date_start',
        'repair_date_finish',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function lines()
    {
        return $this->hasMany(RepairLogLine::class);
    }


    public function checklist()
    {
        return $this->belongsTo(MachineChecklist::class, 'machine_checklist_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'repaired_by');
    }

    public function repairedBy()
    {
        return $this->belongsTo(User::class, 'repaired_by');
    }
}
