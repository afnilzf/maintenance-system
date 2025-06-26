<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineChecklistLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_checklist_id',
        'component_id',
        'condition',
        'treatment',
        'note',
    ];

    public function checklist()
    {
        return $this->belongsTo(MachineChecklist::class, 'machine_checklist_id');
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }
}
