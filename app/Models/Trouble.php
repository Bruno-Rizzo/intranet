<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trouble extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function helpdesks()
    {
       return $this->hasMany(Helpdesk::class);
    }
}
