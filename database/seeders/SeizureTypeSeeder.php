<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeizureType;

class SeizureTypeSeeder extends Seeder
{

    public function run()
    {
        SeizureType::create(['name'=>'Bateria']);
        SeizureType::create(['name'=>'Carregador']);
        SeizureType::create(['name'=>'Celular']);
        SeizureType::create(['name'=>'Chip']);
        SeizureType::create(['name'=>'Comprimido Entorpecente']);
        SeizureType::create(['name'=>'Dinheiro']);
        SeizureType::create(['name'=>'Erva Seca']);
        SeizureType::create(['name'=>'Esteróide']);
        SeizureType::create(['name'=>'Fone de Ouvido']);
        SeizureType::create(['name'=>'Jóia']);
        SeizureType::create(['name'=>'Micro Ponto de Droga Sintética']);
        SeizureType::create(['name'=>'Pasta Escura']);
        SeizureType::create(['name'=>'Pedra Entorpecente']);
        SeizureType::create(['name'=>'Pó Amarelo']);
        SeizureType::create(['name'=>'Pó Branco']);
        SeizureType::create(['name'=>'Prisão']);
        SeizureType::create(['name'=>'Relógio']);
        SeizureType::create(['name'=>'Roteador / Modem']);
    }
}
