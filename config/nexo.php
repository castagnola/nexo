<?php

return [
    'phonesTypes' => [
        [
            'name' => 'Teléfono fijo',
            'slug' => 'telefono-fijo',
            'icon' => 'fa fa-phone'
        ],

        [
            'name' => 'Teléfono móvil',
            'slug' => 'telefono-movil',
            'icon' => 'fa fa-phone'
        ]
    ],

    'contactTypes' => [
        [
            'name' => 'Teléfono fijo',
            'slug' => 'telefono-fijo',
            'icon' => 'fa fa-phone'
        ],

        [
            'name' => 'Teléfono móvil',
            'slug' => 'telefono-movil',
            'icon' => 'fa fa-phone'
        ],

        [
            'name' => 'Dirección',
            'slug' => 'direccion',
            'icon' => 'fa fa-building'
        ],
    ],

    'documentTypes' => [
        [
            'name' => 'Cédula de ciudadanía',
            'slug' => 'CC'
        ],
        [
            'name' => 'NIT',
            'slug' => 'NIT'
        ],
        [
            'name' => 'Cédula de extranjería',
            'slug' => 'CE'
        ],
        [
            'name' => 'Pasaporte',
            'slug' => 'PA'
        ],
    ],

    'assignmentsOptions' => [
        'with' => [
            [
                'value' => 'services',
                'name' => 'Con servicio(s)'
            ],
            [
                'value' => 'products',
                'name' => 'Con producto(s)'
            ],
            [
                'value' => 'both',
                'name' => 'Con ambos'
            ],
        ],
        'types' => [
            [
                'name' => 'Por demanda',
                'value' => 'demand'
            ],
            [
                'name' => 'Obligatorio',
                'value' => 'mandatory'
            ]
        ],

        'dates' => [
            [
                'name' => 'Inmediato',
                'value' => 'inmediate'
            ],
            [
                'name' => 'Programado',
                'value' => 'schedule'
            ],
            [
                'name' => 'Recurrente',
                'value' => 'recurrent'
            ]
        ],

        'frecuency' => [
            [
                'value' => 'daily',
                'label' => 'Cada día',
                'single_label' => 'día',
                'multiple_label' => 'días',
            ],
            [
                'value' => 'work_days',
                'label' => 'Todos los días laborables (de lunes a viernes)',
                'hide_inverval' => 'día',
            ],
            [
                'value' => 'weekly',
                'label' => 'Cada semana',
                'single_label' => 'semana',
                'multiple_label' => 'semanas',
            ],
            [
                'value' => 'monthly',
                'label' => 'Cada mes',
                'single_label' => 'mes',
                'multiple_label' => 'meses',
            ],
        ]
    ],

    'ionicID' => env('IONIC_APP_ID', null),
    'ionicKey' => env('IONIC_SECRET_KEY', null),


    'pending_statuses' => [
        'en-ruta',
        'en-ejecucion',
        'por-ejecutar'
    ],
    'actived_statuses' => [
        'en-ruta',
        'en-ejecucion',
    ],
    'completed_statuses' => [
        'realizado',
        'realizado-y-calificado',
    ],

    'expired_status' => 'vencido'
];