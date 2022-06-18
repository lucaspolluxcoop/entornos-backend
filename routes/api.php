<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\PlateStateController;
use App\Http\Controllers\UserCollegeController;
use App\Http\Controllers\ContractPartController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyZoneController;
use App\Http\Controllers\WarrantyTypeController;
use App\Http\Controllers\ExtintionReasonController;
use App\Http\Controllers\ContractWarrantyController;
use App\Http\Controllers\NotificationTypeController;
use App\Http\Controllers\PropertyAmmenityController;
use App\Http\Controllers\ContractExtintionController;
use App\Http\Controllers\PropertyAntiquityController;
use App\Http\Controllers\PropertyTerminationController;
use App\Http\Controllers\ContractNotificationController;
use App\Http\Controllers\EconomicActivityTypeController;
use App\Http\Controllers\NotificationResponseController;
use App\Http\Controllers\PropertyConservationController;
use App\Http\Controllers\ContractLocativeCanonController;
use App\Http\Controllers\PropertyPublicServiceController;
use App\Http\Controllers\PropertyMaintenanceStateController;
use App\Http\Controllers\ContractNotificationCategoryController;
use App\Http\Controllers\ContractNotificationResponseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::middleware('auth:api')->group(function() {
    Route::get('/user', function (Request $request) {
        return response()->json(
                new UserResource(
                    $request->user()->load(
                        ['userState','role', 'profile.plate.plateState', 'profile.city.state','profile.economicActivityType','college']
                    )
                )
            );
    });
    Route::get('users',[UserController::class, 'index'])->name('users.index');
    Route::post('users',[UserController::class,'store'])->name('users.store');
    Route::get('users/{user}',[UserController::class,'show'])->name('users.show');
    Route::post('users/{user}',[UserController::class,'update'])->name('users.update');
    Route::delete('users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::post('users-approve/{user}',[UserController::class,'approve'])->name('users.approve');
    Route::patch('users-password/{user}',[UserController::class,'updatePassword'])->name('users.update-password');
    Route::get('users-find-user',[UserController::class, 'findUser'])->name('users.findUser');
    Route::get('users-grouped-user',[UserController::class, 'findGroupedUser'])->name('users.findGroupedUser');

    Route::get('properties',[PropertyController::class,'index'])->name('properties.index');
    Route::post('properties',[PropertyController::class,'store'])->name('properties.store');
    Route::get('properties/{property}',[PropertyController::class,'show'])->name('properties.show');
    Route::patch('properties/{property}',[PropertyController::class,'update'])->name('properties.update');
    Route::delete('properties/{property}',[PropertyController::class,'destroy'])->name('properties.destroy');
    Route::post('properties/{property}/ammenities',[PropertyAmmenityController::class,'store'])->name('property-ammenities.store');
    Route::post('properties/{property}/services',[PropertyPublicServiceController::class,'store'])->name('property-services.store');
    Route::post('properties/{property}/antiquity',[PropertyAntiquityController::class,'store'])->name('property-antiquity.store');

    Route::get('property-types',[PropertyTypeController::class,'index'])->name('property-types.index');
    Route::get('property-public-services',[PropertyPublicServiceController::class,'index'])->name('property-public-services.index');
    Route::get('property-zones',[PropertyZoneController::class,'index'])->name('property-zones.index');
    Route::get('property-conservations',[PropertyConservationController::class,'index'])->name('property-conservations.index');
    Route::get('property-terminations',[PropertyTerminationController::class,'index'])->name('property-terminations.index');
    Route::get('property-maintenance-states',[PropertyMaintenanceStateController::class,'index'])->name('property-maintenance-states.index');

    Route::get('warranties',[WarrantyController::class,'index'])->name('warranties.index');
    Route::get('warranties/{warranty}',[WarrantyController::class,'show'])->name('warranties.show');
    Route::post('warranties',[WarrantyController::class, 'store'])->name('warranties.store');
    Route::delete('warranties/{warranty}',[WarrantyController::class, 'destroy'])->name('warranties.destroy');

    Route::get('warranty-types',[WarrantyTypeController::class,'index'])->name('warranty-types.index');

    Route::get('contracts',[ContractController::class, 'index'])->name('contracts.index');
    Route::get('contracts/{contract}',[ContractController::class, 'show'])->name('contracts.show');
    Route::post('contracts',[ContractController::class, 'store'])->name('contracts.store');
    Route::patch('contracts/{contract}',[ContractController::class,'update'])->name('contracts.update');
    Route::delete('contracts/{contract}',[ContractController::class,'destroy'])->name('contracts.destroy');

    Route::get('contract-types',[ContractTypeController::class, 'index'])->name('contract-types.index');

    Route::get('contract-locative-canons',[ContractLocativeCanonController::class, 'index'])->name('contract-locative-canons.index');

    Route::get('contract-notifications',[ContractNotificationController::class, 'index'])->name('contract-notifications.index');
    Route::get('contract-notifications/{contractNotification}',[ContractNotificationController::class, 'show'])->name('contract-notifications.show');
    Route::post('contract-notifications',[ContractNotificationController::class, 'store'])->name('contract-notifications.store');
    Route::patch('contract-notifications/{contractNotification}',[ContractNotificationController::class, 'update'])->name('contract-notifications.update');
    Route::delete('contract-notifications/{contractNotification}',[ContractNotificationController::class, 'destroy'])->name('contract-notifications.destroy');

    Route::get('contract-notification-categories',[ContractNotificationCategoryController::class, 'index'])->name('contract-notification-categories.index');

    Route::get('contract-notification-responses',[ContractNotificationResponseController::class, 'index'])->name('contract-notification-responses.index');

    Route::get('contract-parts/{contract}',[ContractPartController::class, 'index'])->name('contract-parts.index');

    Route::patch('contract-extintions/{contract}',[ContractExtintionController::class, 'update'])->name('contract-extintions.update');

    Route::post('contract-warranties/{contract}',[ContractWarrantyController::class, 'store'])->name('contract-warranties.create');
    Route::patch('contract-warranties/{contract}',[ContractWarrantyController::class, 'update'])->name('contract-warranties.update');
    
    Route::get('notification-types', [NotificationTypeController::class, 'index'])->name('notification-types.index');
    Route::get('notification-responses', [NotificationResponseController::class, 'index'])->name('notification-responses.index');

    Route::get('notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('notifications', [NotificationController::class, 'store'])->name('notifications.store');
    Route::patch('notifications/{notification}', [NotificationController::class, 'update'])->name('notifications.update');

    Route::get('extintion-reasons', [ExtintionReasonController::class, 'index'])->name('extintion-reasons.index');

    Route::patch('plates/{plate}', [PlateController::class, 'update'])->name('plates.update');
});

Route::get('roles',[RoleController::class,'index'])->name('role.index');
Route::get('states',[StateController::class,'index'])->name('states.index');
Route::get('plate-states/',[PlateStateController::class,'index'])->name('plate-states.index');
Route::get('economic-activity-types',[EconomicActivityTypeController::class,'index'])->name('economic-activity-types.index');
Route::get('users-colleges',[UserCollegeController::class,'index'])->name('users-colleges.index');
Route::get('users-find-plate',[UserController::class, 'findByPlate'])->name('users.findByPlate');
Route::get('users-find-user',[UserController::class, 'findUser'])->name('users.findUser');
