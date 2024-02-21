<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function admMovements()
    {
        return $this->hasMany(AdmMovements::class);
    }
}
