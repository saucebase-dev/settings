<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Modules\Settings\Http\Controllers\SettingsController;

Route::group(['middleware' => [
    'auth',
    'verified',
    'role:admin|user',
]], function () {
    Route::resource('settings', SettingsController::class)->only(['index']);

    Route::get('settings/profile', function () {
        return Inertia::render('Settings::Profile', [
            'title' => 'Profile',
        ]);
    })->name('settings.profile');
});
