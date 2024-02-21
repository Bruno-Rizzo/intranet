<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Matrial;

class MatrialSeeder extends Seeder
{

    public function run()
    {
        Matrial::create(['name' => 'Casado']);
        Matrial::create(['name' => 'Divorciado']);
        Matrial::create(['name' => 'Solteiro']);
        Matrial::create(['name' => 'União Estável']);
        Matrial::create(['name' => 'Viúvo']);
    }
}
