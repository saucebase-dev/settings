<?php

namespace Modules\Settings\Http\Controllers;

use Inertia\Inertia;

class SettingsController
{
    public function index()
    {
        return Inertia::render('Settings::Index', [
            'title' => 'Welcome to Settings Module',
        ]);
    }

    public function profile()
    {
        return Inertia::render('Settings::Profile', [
            'title' => 'Welcome to Profile Settings',
        ]);
    }
}
