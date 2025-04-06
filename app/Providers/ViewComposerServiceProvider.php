<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
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
        // Share the prefix variable globally
        View::composer('*', function ($view) {
            // Check if the user is authenticated
            $user = auth()->user();

            // Set prefix based on role if user is authenticated, else set empty prefix
            $prefix = $user ? (
                $user->role === 'superadmin' ? 'superadmin'
                : ($user->role === 'sale' ? 'sale'
                
                : ($user->role === 'marketing' ? 'marketing' : ''))
            ) : '';
            // Share prefix with all views
            $view->with('prefix', $prefix);
        });
    }
}
