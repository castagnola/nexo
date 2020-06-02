<?php

use Illuminate\Database\Seeder;

use Laracasts\TestDummy\Factory as TestDummy;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = TestDummy::times(5)->create(Nexo\Entities\Team::class);
        $users = TestDummy::times(10)->create(Nexo\User::class);

        // Roles
        $adminRole = \Sentinel::findRoleBySlug('team-admin');
        $despachadorRole = \Sentinel::findRoleBySlug('despachador');
        $ruteroRole = \Sentinel::findRoleBySlug('rutero');


        foreach ($teams as $team) {
            // Administrator
            $admin = TestDummy::times(1)->create(Nexo\User::class);
            $team->users()->attach($admin);
            $adminRole->users()->attach($admin);

            // Despachadores
            $despachadores = TestDummy::times(rand(2, 3))->create(Nexo\User::class);
            $team->users()->attach($despachadores->lists('id')->toArray());
            $despachadorRole->users()->attach($despachadores->lists('id')->toArray());

            // Ruteros
            $ruteros = TestDummy::times(rand(3, 6))->create(Nexo\User::class);
            $team->users()->attach($ruteros->lists('id')->toArray());
            $ruteroRole->users()->attach($ruteros->lists('id')->toArray());
        }
    }
}
