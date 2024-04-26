<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    // sail artisan db:seed --class=PermissionsSeeder

    public function run()
    {
        Permission::create(['name' => 'helpdesk-visualizar']);
        Permission::create(['name' => 'helpdesk-editar']);
        Permission::create(['name' => 'helpdesk-excluir']);
        Permission::create(['name' => 'apreensão-visualizar']);
        Permission::create(['name' => 'apreensão-cadastrar']);
        Permission::create(['name' => 'apreensão-pesquisar']);
        Permission::create(['name' => 'apreensão-exportar']);
        Permission::create(['name' => 'êxito-visualizar']);
        Permission::create(['name' => 'êxito-cadastrar']);
        Permission::create(['name' => 'êxito-atualizar']);
        Permission::create(['name' => 'êxito-exportar']);
    }
}
