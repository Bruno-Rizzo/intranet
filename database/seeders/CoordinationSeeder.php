<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coordination;

class CoordinationSeeder extends Seeder
{

    public function run()
    {
        Coordination::create(['name'=>'Corrdenação de Gericinó']);
        Coordination::create(['name'=>'Coordenação do Grande Rio']);
        Coordination::create(['name'=>'Coordenação de Niterói']);
        Coordination::create(['name'=>'Coordenação do Norte e Noroeste do Estado']);
    }
}
