<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ModulesTableSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            [
                'name' => 'Estadísticas',
                'slug' => 'estadisticas',
                'description' => 'Muestra las estadísticas de la empresa'
            ],
            [
                'name' => 'Herramientas',
                'slug' => 'herramientas',
                'description' => 'Muestra las herramientas de la empresa'
            ]
        ];

        foreach ($modules as $module) {
            \Nexo\Entities\Module::create($module);
        }
    }
}
