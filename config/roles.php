<?php

return [
    'sudo' => [
        'label' => 'Super Admin',
        'permissions' => [
            'sudo' => [],
            'index' => [], // Tiene permiso para listar (accion 'index') en todas las secciones
            'show' => [], // Tiene permiso para ver (accion 'show') en todas las secciones
            'store' => [], // Tiene permiso para guardar (accion 'store') en todas las secciones
            'update' => [], // Tiene permiso para actualizar (accion 'update') en todas las secciones
            'destroy' => [], // Tiene permiso para eliminar (accion 'destroy') en todas las secciones
        ],
    ],
    'administrator' => [
        'label' => 'Administrador',
        'permissions' => [
            'index' => [
                'users',
                'economic-activity-types',
                'plate-states',
                'property-maintenance-states',
                'user-colleges',
                'warranties',
                'warranty-types',
            ],
            'show' => [
                'users',
            ],
            'store' => [
                'users',
            ],
            'update' => [
                'users',
            ],
            'destroy' => [
                'users',
            ],
        ],
    ],
    'college_real_state_brokers' => [
        'label' => 'Colegio de CI',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users'
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users',
                'plates'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'real_state_broker' => [
        'label' => 'Corredor inmobiliario',
        'permissions' => [
            'index' => [
                'users',
                'contracts',
                'contract-types',
                'warranty-types',
                'property-maintenance-states',
                'property-terminations',
                'property-conservations',
                'contract-locative-canons',
                'notification-types',
                'notification-responses',
                'extintion-reasons',
                'properties',
            ],
            'show' => [
                'users',
                'properties',
                'notification-types',
                'notification-responses',
                'contracts',
                'notifications',
                'users-grouped-user',
            ],
            'store' => [
                'users',
                'properties',
                'warranties',
                'contracts',
                'notifications',
                'contract-warranties',
            ],
            'update' => [
                'users',
                'properties',
                'notifications',
                'contract-extintions',
                'contract-warranties',
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'locator' => [
        'label' => 'Locador',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users',
                'users-grouped-user',
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'tenant' => [
        'label' => 'Locatario',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users',
                'users-grouped-user',
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'warrant' => [
        'label' => 'Aval / Garante',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users',
                'users-grouped-user',
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'third_parties' => [
        'label' => 'Terceros Interesados',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users',
                'users-grouped-user',
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
    'private_locator' => [
        'label' => 'Locador Particular',
        'permissions' => [
            'index' => [
                'users',
                'user-colleges',
                'contracts',
                'notification-types',
                'notification-responses',
            ],
            'show' => [
                'users',
                'users-grouped-user',
            ],
            'store' => [
                'users'
            ],
            'update' => [
                'users'
            ],
            'destroy' => [
                'users'
            ],
        ],
    ],
];
