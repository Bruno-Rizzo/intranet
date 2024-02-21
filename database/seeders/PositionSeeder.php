<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{

    public function run()
    {
        Position::create(['name' => 'Acessor']);
        Position::create(['name' => 'Acessor Especial']);
        Position::create(['name' => 'Analista']);
        Position::create(['name' => 'Coordenador']);
        Position::create(['name' => 'Diretor']);
        Position::create(['name' => 'Escolta']);
        Position::create(['name' => 'Subsecretário']);
        Position::create(['name' => 'Superintendente']);
    }
}
