<?php

use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;

Route::group(['middleware' => [
    'auth',
    'verified',
    'role:admin|user',
]], function () {
    Route::resource('settings', SettingsController::class);
});
