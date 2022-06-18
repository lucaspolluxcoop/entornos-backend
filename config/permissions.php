<?php

/*
|--------------------------------------------------------------------------
| Permissions configuration
|--------------------------------------------------------------------------
| Los permisos son "_SECTION_._ACTION_" se estructuran de la sig. forma:
|
|      '_ACTION_' => [ '_SECTION_' ],
|
| tanto para los nombres de las secciones como de las acciones,
| no se puede utilizar el punto(.) dentro de ellos
|
*/

return [
    'index' => [
        'users',
        'properties',
        'property-maintenance-states',
        'warranties',
        'warranty-types',
        'contracts',
        'contract-types',
        'contract-locative-canons',
        'contract-notification-categories',
        'contract-parts',
        'contract-notification-responses',
        'contract-notifications',
        'notification-types',
        'notification-responses',
        'extintion-reasons',
    ],
    'show' => [
        'users',
        'properties',
        'warranties',
        'contracts',
        'contract-notifications',
        'notifications',
        'users-grouped-user',
    ],
    'store' => [
        'users',
        'properties',
        'warranties',
        'contracts',
        'contract-notifications',
        'notifications',
        'contract-warranties',
    ],
    'update' => [
        'users',
        'properties',
        'contracts',
        'contract-notifications',
        'contract-extintions',
        'notifications',
        'contract-warranties',
        'plates',
    ],
    'destroy' => [
        'users',
        'properties',
        'contracts',
        'warranties',
        'contract-notifications'
    ],
];
