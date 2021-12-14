<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Lauthz\Facades\Enforcer;
use Illuminate\Support\Str;

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
        Blade::if('roles', function ($roles) {
            $identifier = auth()->user()->getAuthIdentifier();

            return Str::of($roles)->replace("'", "")->explode(',')
                ->map(fn (string $role) => in_array($role, Enforcer::getRolesForUser($identifier)))
                ->filter()
                ->isNotEmpty();
        });

        Blade::if('permissions', function ($args) {
            $identifier = auth()->user()->getAuthIdentifier();

            return Str::of($args)->replace("'", "")->explode('|')
                ->map(function (string $expression) use ($identifier) {
                    [$subject, $permissions] = explode(':', $expression);

                    return Str::of($permissions)->explode(',')
                        ->map(fn (string $permission) => Enforcer::enforce(
                            strVal($identifier),
                            $subject,
                            trim($permission)
                        ) || in_array('super-admin', Enforcer::getRolesForUser($identifier)))
                        ->filter()
                        ->isNotEmpty();
                })
                ->filter()
                ->isNotEmpty();
        });
    }
}
