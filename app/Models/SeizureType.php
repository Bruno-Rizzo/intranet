<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeizureType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function seizures()
    {
        return $this->hasMany(Seizure::class);
    }
}
