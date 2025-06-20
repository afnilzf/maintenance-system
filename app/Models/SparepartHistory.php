<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SparepartHistory extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'sparepart_id',
        'type',
        'quantity',
        'unit',
        'supplier',
        'note',
        'requested_by',
    ];

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function requestedBy()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id'); // pastikan field machine_id tersedia untuk stok keluar
    }
}
