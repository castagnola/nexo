<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Administrador',
            'slug' => 'admin',
        ]);

        $adminTeamRole = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Administrador de empresa',
            'slug' => 'team-admin',
        ]);

        $despachadorRole = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Despachador',
            'slug' => 'despachador',
        ]);

        $rutero = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Rutero',
            'slug' => 'rutero',
        ]);

        $nexouser = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Usuario nexo',
            'slug' => 'nexo-user',
        ]);

        $credentials = [
            'email' => 'admin@nexo.co',
            'password' => 'bogota',
            'first_name' => 'Administrador',
            'last_name' => 'Nexo',
            'avatar' => 'nexo-logo.png'
        ];

        $user = \Sentinel::registerAndActivate($credentials);

        $adminRole->users()->attach($user);
    }
}
