<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acaution extends Model
{
    use HasFactory;

    protected $fillable=[
        'administrative_id',
        'type_id',
        'brand',
        'model',
        'caliber',
        'acaution_number',
        'gun_number',
    ];

    public function administrative()
    {
        return $this->belongsTo(Administrative::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


}
