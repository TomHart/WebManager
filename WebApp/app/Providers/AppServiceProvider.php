<?php

namespace App\Providers;

use App\Auth\UnhashedSessionGuard;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        Auth::extend(
            'sessionExtended',
            function ($app) {
                $provider = new EloquentUserProvider($app['hash'], config('auth.providers.users.model'));
                return new UnhashedSessionGuard('sessionExtended', $provider, app()->make('session.store'), request());
            }
        );
    }
}
