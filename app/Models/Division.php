<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function helpdesks()
    {
       return $this->hasMany(Helpdesk::class);
    }

    public function qrcodes()
    {
       return $this->hasMany(QrCode::class);
    }

    public function administratives()
    {
       return $this->hasMany(Administrative::class);
    }

    public function admMovements()
    {
        return $this->hasMany(AdmMovement::class);
    }

    public function vehicles()
    {
       return $this->hasMany(Vehicle::class);
    }

}
