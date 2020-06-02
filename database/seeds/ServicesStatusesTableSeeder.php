<?php

use Illuminate\Database\Seeder;


class ServicesStatusesTableSeeder extends Seeder
{
    public function run()
    {
        $statuses = [
            'Por asignar',
            'En espera',
            'Pendiente',
            'Por ejecutar',
            'En ejecución',
            'Realizado',
            'Realizado y calificado',
            'Cancelado',
            'Con novedad'
        ];

        foreach ($statuses as $status) {
            \Nexo\Entities\ServiceStatus::create([
                'name' => $status,
                'slug' => str_slug($status)
            ]);
        }
    }
}
