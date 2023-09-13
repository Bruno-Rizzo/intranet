<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Bruno Rizzo',
            'email'             => '50008382@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Administrador'])->id,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Marcos Sandro',
            'email'             => '50212419@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Analista Teste',
            'email'             => '12345678@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Analista'])->id,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
