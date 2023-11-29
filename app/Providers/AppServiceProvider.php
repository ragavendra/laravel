<?php

namespace App\Providers;

use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;

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
        /*
        DB::listen(function (QueryExecuted $query) {
            // $query->sql;
            // $query->bindings;
            // $query->time;
            echo("Query " . $query->sql ." Time " . $query->time ." Bindings " . $query->bindings);
        });*/

        /*
        // share data with many views
        View::share('key', 'value');

        */
    }
}
