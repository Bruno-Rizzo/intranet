<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Trouble;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuxiliaryTables extends Seeder
{
    
    public function run()
    {
        Division::create(['name' => 'Assessoria de Suporte Técnico']);
        Division::create(['name' => 'Assessoria Especial de Inteligência']);
        Division::create(['name' => 'Divisão Administrativa']);
        Division::create(['name' => 'Divisão de Informática']);
        Division::create(['name' => 'Divisão de Protocolo']);
        Division::create(['name' => 'Escola de Inteligência Penitenciária']);
        Division::create(['name' => 'Gabinete do Subsecretário']);
        Division::create(['name' => 'Núcleo de Inteligência de Campos']);
        Division::create(['name' => 'Núcleo de Inteligência de Gericinó']);
        Division::create(['name' => 'Núcleo de Inteligência do Grande Rio']);
        Division::create(['name' => 'Núcleo de Inteligência de Japeri']);
        Division::create(['name' => 'Núcleo de Inteligência de Niterói']);
        Division::create(['name' => 'Núcleo de Inteligência do Leste Fluminense']);
        Division::create(['name' => 'Núcleo de Inteligência do Sul Fluminense']);
        Division::create(['name' => 'Serviço de Pesquisa e Acompanhamento Processual']);
        Division::create(['name' => 'Superintendência de Ações Especializadas']);
        Division::create(['name' => 'Superintendência de Contrainteligência']); 
        Division::create(['name' => 'Superintendência de Inteligência']); 
        Division::create(['name' => 'Superintendência de Inteligência Eletrônica']); 
        Division::create(['name' => 'Superintendência de Recaptura']); 

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
