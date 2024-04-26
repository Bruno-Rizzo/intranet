<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faction;

class FactionSeeder extends Seeder
{

    public function run()
    {
        Faction::create(['name'=>'Amigos dos Amigos (ADA)']);
        Faction::create(['name'=>'Comando Vermelho (CV)']);
        Faction::create(['name'=>'ExPMs / Midiáticos']);
        Faction::create(['name'=>'Federal']);
        Faction::create(['name'=>'Ingresso']);
        Faction::create(['name'=>'Ingresso Nível Superior']);
        Faction::create(['name'=>'Milícia']);
        Faction::create(['name'=>'Neutro']);
        Faction::create(['name'=>'Políciais Ativa (PC/PP)']);
        Faction::create(['name'=>'Povo de Israel (PVI)']);
        Faction::create(['name'=>'Terceiro Comando Puro (TCP)']);
    }
}
