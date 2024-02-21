<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movement;

class MovementSeeder extends Seeder
{

    public function run()
    {
        Movement::create(['name' => 'Ingresso']);
        Movement::create(['name' => 'Reingresso']);
        Movement::create(['name' => 'Saída']);
        Movement::create(['name' => 'Substituição']);
    }
}
