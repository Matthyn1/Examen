<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //making the logged-in user a global variable for easier access
        view()->composer('*',function($view) {
            $view->with('user', Auth::user());
        });
        //Gates to define what Role is linked to the user using Role_ID
        Gate::define('admin', function (User $user) {
            return $user->role_ID === 1;
        });
        Gate::define('algemeen', function (User $user) {
            return $user->role_ID === 2;
        });
        Gate::define('uitgifte', function (User $user) {
            return $user->role_ID === 3;
        });
        Gate::define('verwerking', function (User $user) {
            return $user->role_ID === 4;
        });
        Gate::define('inname', function (User $user) {
            return $user->role_ID === 5;
        });
        Gate::define('appbeheer', function (User $user) {
            return $user->role_ID === 6;
        });
    }
}
