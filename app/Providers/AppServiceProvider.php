<?php

namespace App\Providers;

use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // will use same instance of middleware for term
        $this->app->singleton(EnsureUserHasRole::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
