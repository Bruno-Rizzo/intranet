<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'administrative_id',
        'division_id',
        'position_id',
        'movement_id',
        'date'
    ];

    public function administrative()
    {
        return $this->belongsTo(Administrative::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }


}
