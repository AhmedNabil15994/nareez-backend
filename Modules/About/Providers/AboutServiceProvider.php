<?php

namespace Modules\About\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AboutServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('About', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('About', 'Config/config.php') => config_path('about.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('About', 'Config/config.php'),
            'about'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/about');

        $sourcePath = module_path('About', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/about';
        }, \Config::get('view.paths')), [$sourcePath]), 'about');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/about');
        $attributesPath = module_path('About', 'Resources/lang/'.app()->getLocale().'/attributes.php');
        if (file_exists($attributesPath)) {
            setValidationAttributes(include $attributesPath);
        }

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'about');
        } else {
            $this->loadTranslationsFrom(module_path('About', 'Resources/lang'), 'about');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('About', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
