<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'name',
        'measurement_criteria',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
