<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            DivisionsSeeder::class,
            TroublesSeeder::class,
            AddTroublesSeeder::class,
            PermissionsSeeder::class,
            UsersSeeder::class,
            AssiginPermissionsSeeder::class,
            MatrialSeeder::class,
            MovementSeeder::class,
            PositionSeeder::class,
            TypeSeeder::class,
        ]);
    }
}
