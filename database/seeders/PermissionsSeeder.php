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
        Permission::create(['name' => 'helpdesk-visualizar']);
        Permission::create(['name' => 'helpdesk-editar']);
        Permission::create(['name' => 'helpdesk-excluir']);
    }
}
