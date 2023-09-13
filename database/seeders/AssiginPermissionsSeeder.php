<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssiginPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_role')->insert([

            ['permission_id'=>'1', 'role_id'=>'1'],
            ['permission_id'=>'2', 'role_id'=>'1'],
            ['permission_id'=>'3', 'role_id'=>'1']

           ]);
    }
}
