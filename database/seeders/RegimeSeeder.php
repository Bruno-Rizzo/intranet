<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regime;

class RegimeSeeder extends Seeder
{

    public function run()
    {
        Regime::create(['name'=>'Fechado']);
        Regime::create(['name'=>'Fechado/Semiaberto']);
        Regime::create(['name'=>'Fechado/Provisório']);
        Regime::create(['name'=>'Fechado/Provisório/Semiaberto']);
        Regime::create(['name'=>'Fechado/Provisório/Semiaberto/Aberto']);
        Regime::create(['name'=>'Semiaberto']);
        Regime::create(['name'=>'Semiaberto/Aberto']);
        Regime::create(['name'=>'Provisório']);
        Regime::create(['name'=>'Provisório/Aberto']);
        Regime::create(['name'=>'Ingresso']);
        Regime::create(['name'=>'Medida de Segurança']);
    }
}
