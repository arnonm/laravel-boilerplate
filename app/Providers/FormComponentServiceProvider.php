<?php


namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Collection;
use App\Domains\FormComponents\FormDataBinder;
use Illuminate\Support\ServiceProvider;

class FormComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../Domains/FormComponents/config/config.php' => config_path('form-components.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../Domains/FormComponents/resources/views' => base_path('resources/views/vendor/form-components'),
            ], 'views');
        }

        $this->loadViewsFrom(__DIR__ . '/../Domains/FormComponents/resources/views', 'form-components');

        //

        Blade::directive('bind', function ($bind) {
            return '<?php app(\App\Domains\FormComponents\FormDataBinder::class)->bind(' . $bind . '); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\App\Domains\FormComponents\FormDataBinder::class)->pop(); ?>';
        });

        Blade::directive('wire', function () {
            return '<?php app(\App\Domains\FormComponents\FormDataBinder::class)->wire(); ?>';
        });

        Blade::directive('endwire', function () {
            return '<?php app(\App\Domains\FormComponents\FormDataBinder::class)->endWire(); ?>';
        });

        //

        $prefix = config('form-components.prefix');

        Collection::make(config('form-components.components'))->each(
            fn($component, $alias) => Blade::component($alias, $component['class'], $prefix)
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/form-components.php', 'form-components');

        $this->app->singleton(FormDataBinder::class, fn() => new FormDataBinder);
    }
}
