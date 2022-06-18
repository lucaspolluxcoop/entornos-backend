<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locatorRole = Role::where('name',Role::LOCADOR)->first()->id;
        $tenantRole = Role::where('name',Role::LOCATARIO)->first()->id;
        $warrantRole = Role::where('name',Role::GARANTE)->first()->id;
        $notificationTypes = [
            [
                'title' => 'Gestiones administrativas ordinarias',
                'notificationReasons'       => [
                    [
                        'id'        => 1,
                        'title'     => 'Falta de mantenimiento del inmueble',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 2,
                        'title'     => 'Restricciones en el uso y goce pleno del inmueble locado',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 3,
                        'title'     => 'Vicios ocultos',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 4,
                        'title'     => 'Otro',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 5,
                        'title'     => 'Falta de pago en término del canon locativo',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 6,
                        'title'     => 'Cambio de destino o uso irregular del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 7,
                        'title'     => 'Falta de conservación de la cosa',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 8,
                        'title'     => 'Incumplimiento de normas de convivencia',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 9,
                        'title'     => 'Solicitud de desocupación del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 10,
                        'title'     => 'Falta de pago gastos de restitución del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 11,
                        'title'     => 'Deuda por impuestos o servicios',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 12,
                        'title'     => 'Incumplimiento en el plazo de restitución del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 13,
                        'title'     => 'Otro',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 14,
                        'title'     => 'Falta de pago en término del canon locativo',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 15,
                        'title'     => 'Falta de pago gastos de restitución del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 16,
                        'title'     => 'Deuda por impuestos o servicios',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 17,
                        'title'     => 'Solicitud de desocupación del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 18,
                        'title'     => 'Incumplimiento en el plazo de restitución del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 19,
                        'title'     => 'Otro',
                        'role_id'   => $warrantRole,
                    ],
                ],
                'notificationManagements'   => [
                    [
                        'title' => 'Presencial'
                    ],
                    [
                        'title' => 'Telefónica verbal'
                    ],
                    [
                        'title' => 'Telefónica por mensajería instantánea'
                    ],
                    [
                        'title' => 'Mensaje de text por correo electrónico'
                    ],
                ]
                ],
            [
                'title' => 'Reclamos Formales',
                'notificationReasons'       => [
                    [
                        'id'        => 20,
                        'title'     => 'Falta de mantenimiento del inmueble',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 21,
                        'title'     => 'Restricciones en el uso y goce pleno del inmueble locado',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 22,
                        'title'     => 'Vicios ocultos',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 23,
                        'title'     => 'Otro',
                        'role_id'   => $locatorRole,
                    ],
                    [
                        'id'        => 24,
                        'title'     => 'Cesación de pago del canon locativo',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 25,
                        'title'     => 'Cambio de destino o uso irregular del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 26,
                        'title'     => 'Falta de conservación de la cosa',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 27,
                        'title'     => 'Incumplimiento de normas de convivencia',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 28,
                        'title'     => 'Falta de pago gastos de restitución del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 29,
                        'title'     => 'Deuda por impuestos o servicios',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 30,
                        'title'     => 'Incumplimiento en el plazo de restitución del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 31,
                        'title'     => 'Desocupación / Desalojo del inmueble',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 32,
                        'title'     => 'Otro',
                        'role_id'   => $tenantRole,
                    ],
                    [
                        'id'        => 33,
                        'title'     => 'Cesación de pago del canon locativo',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 34,
                        'title'     => 'Falta de pago gastos de restitución del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 35,
                        'title'     => 'Deuda por impuestos o servicios',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 36,
                        'title'     => 'Incumplimiento en el plazo de restitución del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 37,
                        'title'     => 'Desocupación / Desalojo del inmueble',
                        'role_id'   => $warrantRole,
                    ],
                    [
                        'id'        => 38,
                        'title'     => 'Otro',
                        'role_id'   => $warrantRole,
                    ],
                ],
                'notificationManagements'   => [
                    [
                        'title' => 'Notificación por medio formal'
                    ],
                    [
                        'title' => 'Gestiones profesionales prejudiciales'
                    ],
                    [
                        'title' => 'Gestiones judiciales'
                    ]
                ]
            ]
        ];
        foreach($notificationTypes as $notificationType) {
            $notification = NotificationType::factory()->create(['title' => $notificationType['title']]);
            $notification->reasons()->createMany($notificationType['notificationReasons']);
            $notification->managements()->createMany($notificationType['notificationManagements']);
        }
    }
}
