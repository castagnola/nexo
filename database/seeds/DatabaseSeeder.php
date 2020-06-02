<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(UserTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(ServicesStatusesTableSeeder::class);

        $this->call(LocationsStatesTableSeeder::class);
        $this->call(LocationsCitiesTableSeeder::class);

        Model::reguard();
    }
}
