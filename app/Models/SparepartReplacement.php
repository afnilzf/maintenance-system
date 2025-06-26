<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartReplacement extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'sparepart_id',
        'replacement_date',
        'quantity',
        'unit',
        'note',
        'replaced_by',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function replacedBy()
    {
        return $this->belongsTo(User::class, 'replaced_by');
    }
}
