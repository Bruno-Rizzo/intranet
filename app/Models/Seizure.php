<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seizure extends Model
{
    use HasFactory;

    protected $fillable = [
        'prisional_unity_id',
        'coordination_id',
        'date',
        'seizure_type_id',
        'amount'
    ];

    public function prisionalUnity()
    {
        return $this->belongsTo(PrisionalUnity::class);
    }

    public function seizureType()
    {
        return $this->belongsTo(SeizureType::class);
    }

    public function coordination()
    {
        return $this->belongsTo(Coordination::class);
    }
}
