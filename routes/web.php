<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::group(['middleware' => [
    'auth',
    'verified',
    'role:admin|user',
]], function () {
    Route::prefix('settings')->group(function () {
        Route::get('index', [SettingsController::class, 'index'])
            ->name('settings.index');

        Route::get('profile', [SettingsController::class, 'profile'])
            ->name('settings.profile');
    });
});
