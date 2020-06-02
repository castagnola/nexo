<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TransportsTableSeeder extends Seeder
{
    public function run()
    {
        $transports = [
            [
                'name' => 'Moto',
                'icon' => 'moto'
            ],
            [
                'name' => 'Automóvil',
                'icon' => 'carro'
            ],
            [
                'name' => 'Camioneta',
                'icon' => 'camioneta'
            ],
            [
                'name' => 'Furgoneta',
                'icon' => 'furgoneta'
            ],
            [
                'name' => 'Camión',
                'icon' => 'camion'
            ],
            [
                'name' => 'Tractomula',
                'icon' => 'tractomula'
            ],
        ];

        foreach ($transports as $transport) {
            \Nexo\Entities\Transport::create($transport);
        }
    }
}
