<?php

namespace App\Providers;

use App\Core\DebtCalculator;
use App\Support\Breadcrumbs;
use App\Support\UrlBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('breadcrumbs', function () {
            return new Breadcrumbs();
        });

        $this->app->singleton('calculator', function () {
            return new DebtCalculator();
        });
    }
}
