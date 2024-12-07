<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

public function boot()
{
    View::share('dashboardUrl', function () {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return route('admin.dashboard');
            }
            if (Auth::user()->role === 'employee') {
                return route('employee.dashboard');
            }
        }
        return route('login'); // Redirect to login if not authenticated
    });
}

}
