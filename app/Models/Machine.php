<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'year_acquired',
        'inventory_number',
        'code',
        'status',
        'condition',
        'length',
        'width',
        'height',
        'power',
        'supplier',
        'repair_complexity',
        'image',
        'created_by'
    ];

    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function sparepartUsages()
    {
        return $this->hasMany(SparepartHistory::class, 'machine_id');
    }
}
