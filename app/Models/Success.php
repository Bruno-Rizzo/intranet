<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Success extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'sector_id',
        'boss_name',
        'boss_id',
        'coordination_id',
        'coordination_boss_name',
        'coordination_boss_id',
        'prisional_unity_id',
        'faction_id',
        'regime_id',
        'director_name',
        'director_id',
        'subdirector_name',
        'subdirector_id',
        'security_boss_name',
        'security_boss_id',
        'team_boss_name',
        'team_boss_id',
        'ro_number',
        'seal_number',
        'dynamics_of_fact'
];

public function sector()
{
    return $this->belongsTo(Sector::class);
}

public function coordination()
{
    return $this->belongsTo(Coordination::class);
}

public function prisionalUnity()
{
    return $this->belongsTo(PrisionalUnity::class);
}

public function faction()
{
    return $this->belongsTo(Faction::class);
}

public function regime()
{
    return $this->belongsTo(Regime::class);
}
}
