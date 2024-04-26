<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{

    public function run()
    {
        Sector::create(['name'=>'Núcleo de Inteligência de Campos']);
        Sector::create(['name'=>'Núcleo de Inteligência de Gericinó']);
        Sector::create(['name'=>'Núcleo de Inteligência do Grande Rio']);
        Sector::create(['name'=>'Núcleo de Inteligência de Japeri']);
        Sector::create(['name'=>'Núcleo de Inteligência de Niterói']);
        Sector::create(['name'=>'Núcleo de Inteligência do Leste Fluminense']);
        Sector::create(['name'=>'Núcleo de Inteligência do Sul Fluminense']);
        Sector::create(['name'=>'Superintendência de Ações Especializadas']);
    }
}
