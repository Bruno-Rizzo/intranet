<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trouble;

class TroublesSeeder extends Seeder
{
    public function run()
    {

        Trouble::create(['name' => 'Dificuldade com Impressão']);
        Trouble::create(['name' => 'Dificuldade com Scanner']);
        Trouble::create(['name' => 'Dúvida Sobre Algum Assunto Relacionado à TI']);
        Trouble::create(['name' => 'Mudar Equipamento de Sala ou de Local']);
        Trouble::create(['name' => 'Necessita de Senha de Acesso para Algum Sistema']);
        Trouble::create(['name' => 'Necessita de Visita Técnica para Alguma Aprovação']);
        Trouble::create(['name' => 'Necessita Instalar algum Hardware (impressora, monitor, switch, etc)']);
        Trouble::create(['name' => 'Necessita Instalar algum Software / Aplicativo']);
        Trouble::create(['name' => 'Problemas com Hardware (computador, Monitor, teclado, mouse, etc)']);
        Trouble::create(['name' => 'Sem Acesso à Internet / VPN']);

    }
}
