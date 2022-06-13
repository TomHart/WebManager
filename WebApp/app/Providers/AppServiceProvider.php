<?php

namespace App\Providers;

use App\Auth\UnhashedSessionGuard;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        AbstractPaginator::defaultView('components.table-pagination');
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

        Blade::directive('isAdmin', fn() => "<?php if(auth()->user() && auth()->user()->is_admin): ?>");
        Blade::directive('elseIsAdmin', fn() => '<?php else: ?>');
        Blade::directive('endIsAdmin', fn() => '<?php endif; ?>');
    }
}
