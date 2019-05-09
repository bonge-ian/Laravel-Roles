<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class CustomBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // create custom blade template
        Blade::if('isAdmin', function ($user) {
            // check if user has admin/hr role and is logged in.
            return (Auth::user() && Auth::user()->hasAnyRoles($user)) ? true: false;
        });
    }
}
