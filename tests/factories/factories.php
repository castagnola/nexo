<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory(Nexo\User::class, function (Faker\Generator $faker) {

    if (!is_dir(storage_path('app/avatars'))) {
        mkdir(storage_path('app/avatars'));
    }

    if (!is_dir(storage_path('app/avatars/tests'))) {
        mkdir(storage_path('app/avatars/tests'));
    }

    $avatar = json_decode(file_get_contents('http://uifaces.com/api/v1/random'))->image_urls->epic;

    $name = str_random() . '.jpg';
    \Image::make($avatar)->save(storage_path('app/avatars/' . $name));


    $email = strtolower($faker->companyEmail);


    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $email,
        'password' => bcrypt('bogota'),
        'avatar' => "avatars/{$name}"
    ];
});

$factory(Nexo\Entities\Team::class, function (Faker\Generator $faker) {

    if (!is_dir(storage_path('app/logos'))) {
        mkdir(storage_path('app/logos'));
    }

    $logo = $faker->image(storage_path('app/logos'), 500, 500, null, false);

    $name = $faker->company;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'logo' => 'logos/' . $logo
    ];
});