<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SparepartRequest extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'sparepart_id',
        'quantity',
        'description',
        'requested_by',
        'status',
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
}
