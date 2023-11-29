<?php
 
namespace App\Providers;
 
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ...
    }
 
    /**
     * Bootstrap any application services.
     * Runs the below methods when that view is called - View callback
     */
    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('profile', ProfileComposer::class);

        /* multiple views
        View::composer(
        ['profile', 'dashboard'],
        MultiComposer::class

        // all
        Facades\View::composer('*', function (View $view) {
        // ...
        });
        );
        php artisan view:cache
        */
 
        // Using closure based composers...
        Facades\View::composer('welcome', function (View $view) {
            // ...
        });
 
        Facades\View::composer('dashboard', function (View $view) {
            // ...
        });

        /* View creater runs innediately after view starts render unlike renders
        use App\View\Creators\ProfileCreator;
        use Illuminate\Support\Facades\View;
 
        View::creator('profile', ProfileCreator::class);
        */
    }
}