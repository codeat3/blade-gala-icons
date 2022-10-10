<?php

declare(strict_types=1);

namespace Codeat3\BladeGalaIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeGalaIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-gala-icons', []);

            $factory->add('gala-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-gala-icons.php', 'blade-gala-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-gala-icons'),
            ], 'blade-gala-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-gala-icons.php' => $this->app->configPath('blade-gala-icons.php'),
            ], 'blade-gala-icons-config');
        }
    }
}
