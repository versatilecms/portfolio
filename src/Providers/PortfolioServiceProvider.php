<?php

namespace Versatile\Portfolio\Providers;

use Versatile\Portfolio\Commands;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Versatile\Core\Policies\BasePolicy;
use Versatile\Portfolio\Portfolio;
use Versatile\Portfolio\PortfolioCategories;

class PortfolioServiceProvider extends ServiceProvider
{
    /**
     * Our root directory for this package to make traversal easier
     */
    protected $packagePath = __DIR__ . '/../../';

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Portfolio::class  => BasePolicy::class,
        PortfolioCategories::class => BasePolicy::class,
    ];

    /**
     * Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
        $this->strapRoutes();
        $this->strapViews();
        $this->strapMigrations();
        $this->strapCommands();

        $this->registerPolicies();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Merge our Scout config over
        $this->mergeConfigFrom($this->packagePath . 'config/scout.php', 'scout.tntsearch.searchableModels');
    }

    /**
     * Bootstrap our Routes
     */
    protected function strapRoutes()
    {
        $this->loadRoutesFrom($this->packagePath . 'routes/web.php');
    }

    /**
     * Bootstrap our Views
     */
    protected function strapViews()
    {
        // Load views
        $this->loadViewsFrom($this->packagePath . 'resources/views/vendor/versatile-frontend', 'versatile-frontend');
        $this->loadViewsFrom($this->packagePath . 'resources/views/vendor/versatile', 'versatile');
    }

    /**
     * Bootstrap our Migrations
     */
    protected function strapMigrations()
    {
        // Load migrations
        $this->loadMigrationsFrom($this->packagePath . 'database/migrations');

        // Locate our factories for testing
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(
            $this->packagePath . 'database/factories'
        );
    }

    /**
     * Bootstrap our Commands/Schedules
     */
    protected function strapCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class
            ]);
        }
    }
}
