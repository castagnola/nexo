<?php

use Illuminate\Database\Seeder;


use Laracasts\TestDummy\Factory as TestDummy;

class TeamUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = \Nexo\Entities\Team::find(6);
        $ruteroRole = \Sentinel::findRoleBySlug('rutero');

        // Ruteros
        $ruteros = TestDummy::times(200)->create(Nexo\User::class);
        $team->users()->attach($ruteros->lists('id')->toArray());
        $ruteroRole->users()->attach($ruteros->lists('id')->toArray());
    }
}
