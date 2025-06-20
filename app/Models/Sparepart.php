<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sparepart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specification',
        'stock',
        'unit',
        'supplier',
    ];

    public function histories()
    {
        return $this->hasMany(SparepartHistory::class);
    }

    public function requests()
    {
        return $this->hasMany(SparepartRequest::class);
    }

    public function pendingRequest()
    {
        return $this->hasOne(\App\Models\SparepartRequest::class)->where('status', 'pending');
    }
}
