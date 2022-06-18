<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\UserStateSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\PlateStateSeeder;
use Database\Seeders\ContractTypeSeeder;
use Database\Seeders\PropertyTypeSeeder;
use Database\Seeders\PropertyZoneSeeder;
use Database\Seeders\WarrantyTypeSeeder;
use Database\Seeders\ExtintionReasonSeeder;
use Database\Seeders\NotificationTypeSeeder;
use Database\Seeders\PropertyAmmenitySeeder;
use Database\Seeders\PropertyTerminationSeeder;
use Database\Seeders\EconomicActivityTypeSeeder;
use Database\Seeders\NotificationResponseSeeder;
use Database\Seeders\PropertyConservationSeeder;
use Database\Seeders\ContractLocativeCanonSeeder;
use Database\Seeders\PropertyPublicServiceSeeder;
use Database\Seeders\AddEconomicActivityTypeSeeder;
use Database\Seeders\PropertyMaintenanceStateSeeder;
use Database\Seeders\PropertyPublicServiceSecondSeeder;
use Database\Seeders\ContractNotificationCategorySeeder;
use Database\Seeders\ContractNotificationResponseSeeder;
use Database\Seeders\ThirdPartyEconomicActivityTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $local_env = config('app.env') == 'local';
        $test_env = config('app.env') == 'testing';
        $prod_env = config('app.env') == 'prod_migration';

        $this->call(EconomicActivityTypeSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(WarrantyTypeSeeder::class);
        $this->call(ContractNotificationCategorySeeder::class);
        $this->call(ContractTypeSeeder::class);
        $this->call(PropertyTypeSeeder::class);
        $this->call(PropertyZoneSeeder::class);
        $this->call(PropertyPublicServiceSeeder::class);
        $this->call(PropertyAmmenitySeeder::class);
        $this->call(PropertyConservationSeeder::class);
        $this->call(PropertyTerminationSeeder::class);
        $this->call(PlateStateSeeder::class);
        $this->call(PropertyMaintenanceStateSeeder::class);
        $this->call(PropertyPublicServiceSecondSeeder::class);
        $this->call(ContractLocativeCanonSeeder::class);
        $this->call(ContractNotificationResponseSeeder::class);
        $this->call(AddEconomicActivityTypeSeeder::class);
        $this->call(UserStateSeeder::class);
        $this->call(NotificationTypeSeeder::class);
        $this->call(NotificationResponseSeeder::class);
        $this->call(ExtintionReasonSeeder::class);
        $this->call(ThirdPartyEconomicActivityTypeSeeder::class);
    }
}
