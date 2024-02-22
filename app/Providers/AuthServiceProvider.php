<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /*
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        or

        Gate::define('update-post', [PostPolicy::class, 'update']);

        */

        /* / arr as 2nd arg
        Gate::define('create-post', function (User $user, Category $category, bool $pinned) {
            if (!$user->canPublishToGroup($category->group)) {
                return false;
            } elseif ($pinned && !$user->canPinPosts()) {
                return false;
            }

            return true;
        });

        if (Gate::check('create-post', [$category, $pinned])) {
            // The user can create the post...
        }*/

        /*/ resp with mesg
        Gate::define('edit-settings', function (User $user) {
            return $user->isAdmin
                ? Response::allow()
                : Response::deny('You must be an administrator.');
        });*/
    }
}
