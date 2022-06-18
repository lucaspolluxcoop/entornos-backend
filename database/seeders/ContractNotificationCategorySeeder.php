<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContractNotificationCategory;

class ContractNotificationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contractNotificationCategories = [
            "Incumplimiento del Locatario" => ["Falta de pago en término del canon locativo","Cambio de destino o uso irregular del inmueble","Falta de conservación de la cosa","Falta de pago gastos de restitución del inmueble","Solicitud de desocupación del inmueble"],
            "Incumplimiento Garantía/Fianza" => ["Falta de pago en término del canon locativo","Falta de pago gastos de restitución del inmueble","Deuda por impuestos o servicios","Deuda por impuestos o servicios","Incumplimiento en el plazo de restitución del inmueble","Acciones legales"],
            "Restitución del Inmueble" => ["Incumplimiento del Locador","Falta de conservación del inmueble","Vicios Redhibitorios","Acciones legales"],
            "Gestiones para obtener la desocupación" => ["Fallecimiento del Locatario","Vencimiento del plazo locativo","Rescisión del contrato por acuerdo de partes","Rescisión del contrato por ejercicio del derecho del Locatario","Desalojo judicial","Incumplimiento del Locador"]
        ];

        foreach ($contractNotificationCategories as $parent => $children) {
            $cnc = ContractNotificationCategory::factory()->create([
                'title' => $parent
            ]);
            foreach($children as $child) {
                ContractNotificationCategory::factory()->create([
                    'title' => $child,
                    'parent_id' => $cnc
                ]);
            }
        }
    }
}