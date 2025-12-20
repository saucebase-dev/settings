<?php

namespace Modules\Settings\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Navigation\Services\NavigationRegistry;
use Spatie\Navigation\Section;

class SettingsServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Settings';

    protected string $moduleNameLower = 'settings';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'database/migrations'));

        // Register navigation after routes are loaded
        $this->app->booted(function () {
            $this->registerNavigation();
        });
    }

    /**
     * Register navigation items.
     */
    protected function registerNavigation(): void
    {
        $registry = app(NavigationRegistry::class);

        // User menu - Settings
        $registry->user()
            ->add('Settings', route('settings.index'), function (Section $section) {
                $section->attributes([
                    'label' => 'Settings',
                    'route' => 'settings.index',
                    'icon' => 'settings',
                    'order' => 10,
                ]);
            });

        // Settings sidebar - General
        $registry->settings()
            ->add('General', route('settings.index'), function (Section $section) {
                $section->attributes([
                    'label' => 'General',
                    'route' => 'settings.index',
                    'icon' => 'settings-2',
                    'order' => 0,
                ]);
            });
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->moduleName, 'config/config.php') => config_path($this->moduleNameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
