<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'whatsapp',
        'division_id',
        'trouble_id',
        'description',
        'status',
    ];

    public function division()
    {
       return $this->belongsTo(Division::class);
    }

    public function trouble()
    {
       return $this->belongsTo(Trouble::class);
    }

}
