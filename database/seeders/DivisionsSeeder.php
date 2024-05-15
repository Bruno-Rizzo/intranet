<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Division;

class DivisionsSeeder extends Seeder
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
        Division::create(['name' => 'Ministério Público (cedido)']);
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

    }
}
