<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'usuario-criar']);
        Permission::create(['name' => 'usuario-visualizar']);
        Permission::create(['name' => 'usuario-editar']);
        Permission::create(['name' => 'usuario-excluir']);
        Permission::create(['name' => 'funcao-criar']);
        Permission::create(['name' => 'funcao-visualizar']);
        Permission::create(['name' => 'funcao-editar']);
        Permission::create(['name' => 'funcao-excluir']);
        Permission::create(['name' => 'permissao-criar']);
        Permission::create(['name' => 'permissao-visualizar']);
        Permission::create(['name' => 'permissao-editar']);
        Permission::create(['name' => 'permissao-excluir']);
        Permission::create(['name' => 'associar-permissao']);
        Permission::create(['name' => 'helpdesk-visualizar']);
        Permission::create(['name' => 'helpdesk-editar']);
        Permission::create(['name' => 'helpdesk-excluir']);
    }
}
