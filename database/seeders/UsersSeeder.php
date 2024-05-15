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
            'role_id'           => Role::create(['name' => 'Desenvolvedor'])->id,
            'status'            => 1,
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
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Marcelo Alves',
            'email'             => '42189926@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Contrainteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Luis Felipe',
            'email'             => '50002074@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Carla Sibilio',
            'email'             => '50125168@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Gabinete'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Lincoln Henrique',
            'email'             => '19632746@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Administrativo'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Mariana Quevedo',
            'email'             => '50125508@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Escola de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Deborah Rinaldi',
            'email'             => '43367534@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Escola de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Lauro Vieira',
            'email'             => '42586836@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Núcleo de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Willians Melo',
            'email'             => '50129430@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Núcleo de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Rogério Ferreira',
            'email'             => '41961579@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Núcleo de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Janse Santos',
            'email'             => '50100050@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Núcleo de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        User::create([
            'name'              => 'Eric Cavatti',
            'email'             => '42696992@ssispen',
            'password'          => bcrypt('password'),
            'image'             => 'profile.jpg',
            'role_id'           => Role::create(['name' => 'Núcleo de Inteligência'])->id,
            'status'            => 1,
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
