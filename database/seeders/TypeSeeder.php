<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{

    public function run()
    {
        Type::create(['name' => 'Capacete Balístico']);
        Type::create(['name' => 'Colete Balístico']);
        Type::create(['name' => 'Distintivo']);
        Type::create(['name' => 'Espingarda']);
        Type::create(['name' => 'Fuzil']);
        Type::create(['name' => 'Pistola']);
        Type::create(['name' => 'Rifle']);
        Type::create(['name' => 'Revólver']);
    }
}
