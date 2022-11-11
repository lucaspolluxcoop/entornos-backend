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
                'property-public-services',
                'notification-types',
                'notification-responses',
                'property-types',
                'property-conservations',
                'property-terminations',
                'contract-types',
                'contract-locative-canons',
                'users',
                'economic-activity-types',
                'plate-states',
                'property-maintenance-states',
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
    'real_state_broker' => [
        'label' => 'Corredor inmobiliario',
        'permissions' => [
            'index' => [
                'property-maintenance-states',
                'property-public-services',
                'notification-types',
                'notification-responses',
                'property-types',
                'property-conservations',
                'property-terminations',
                'contract-types',
                'contract-locative-canons',
                'users',
                'contracts',
                'warranties',
                'warranty-types',
                'property-maintenance-states',
                'extintion-reasons',
                'properties',
                'contract-parts',
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
                'property-maintenance-states',
                'property-public-services',
                'notification-types',
                'notification-responses',
                'property-types',
                'property-conservations',
                'property-terminations',
                'contract-types',
                'contract-locative-canons',
                'users',
                'contracts',
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
                'property-maintenance-states',
                'property-public-services',
                'notification-types',
                'notification-responses',
                'property-types',
                'property-conservations',
                'property-terminations',
                'contract-types',
                'contract-locative-canons',
                'users',
                'contracts',
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
                'property-maintenance-states',
                'property-public-services',
                'notification-types',
                'notification-responses',
                'property-types',
                'property-conservations',
                'property-terminations',
                'contract-types',
                'contract-locative-canons',
                'users',
                'contracts',
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
    ]
];
