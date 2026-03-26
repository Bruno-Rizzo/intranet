<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identify',
        'division_id',
        'vehicle_type',
        'patrimony_type',
        'brand',
        'model',
        'original_plate',
        'reserved_plate',
        'kilometer',
        'credential_number',
        'disclaimer',
        'status',
        'observations', 
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    
}

