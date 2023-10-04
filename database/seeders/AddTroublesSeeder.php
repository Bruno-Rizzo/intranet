<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trouble;

class AddTroublesSeeder extends Seeder
{
    public function run()
    {

        Trouble::create(['name' => 'Criação de Usuário em algum Sistema']);
        Trouble::create(['name' => 'Inclusão ou Alteração de Dados em algum Sistema']);

    }
}
