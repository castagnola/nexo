<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersGeolocalizationsTableSeeder extends Seeder
{
    public function run()
    {
        $users = \Nexo\User::whereHas('teams', function ($query) {
            return $query->where('slug', 'empresa');
        })->get();

        $faker = Faker\Factory::create();

        // 4.758119, -74.052543
        // 4.517212, -74.097862

        foreach ($users as $user) {
            $geolocalization = $user->geolocalizations()->create([
                'latitude' => $faker->randomFloat(null, 4.517212, 4.758119),
                'longitude' => $faker->randomFloat(null, -74.052543, -74.097862),
            ]);

            event(new \Nexo\Events\GeolocalizationWasCreated($geolocalization));
        }
    }
}
