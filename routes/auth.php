<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::namespace('Auth')->group(function () {
    Route::post('register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('register-complete/{user}', [RegisterController::class, 'update'])->name('auth.update');
    Route::post('forgot-password',[PasswordController::class,'forgot'])->name('auth.forgot-password.forgotPassword');
    Route::post('reset-password',[PasswordController::class,'reset'])->name('auth.reset-password.resetPassword');
});
