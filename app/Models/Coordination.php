<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function successes()
    {
        return $this->hasMany(Success::class);
    }

    public function seizures()
    {
        return $this->hasMany(Seizure::class);
    }
}
