<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
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
        view()->composer('*', function ($view) {
            $view->with('sideBar', [
                'Admin' => [
                    [
                        'icon' => 'desktop-mac',
                        'title' => 'Dashboard',
                        'link' => route('landing')
                    ]
                ],
                'Management' => [
                    [
                        'icon' => 'account',
                        'title' => 'Characters',
                        'link' => route('characters.index')
                    ]
                ]
            ]);
        });
    }
}