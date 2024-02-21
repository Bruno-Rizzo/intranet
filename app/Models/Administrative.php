<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrative extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'position_id',
        'matrial_id',
        'name',
        'identify',
        'photo',
        'address',
        'number',
        'complement',
        'neighborhood',
        'county',
        'city',
        'email',
        'phone',
        'cpf',
        'rg',
        'birth',
        'entry',
        'observations',
        'status',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function matrial()
    {
        return $this->belongsTo(Matrial::class);
    }

    public function acautions()
    {
        return $this->hasMany(Acautions::class);
    }

    public function admMovements()
    {
        return $this->hasMany(AdmMovement::class);
    }

}
