<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autocode extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'description'
    ];

}
