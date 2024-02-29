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
        Gate::define('admin', function ($user) {
            return $user->id === 1;
            // return $user->id === 1 || $user->id === 2;
            // if(in_Array($user->id, [
            //     1,
            //     13,
            //     5
            // ])) {
            //     return true;
            // } else {
            //     return false;
            // }
            //user id must be 1.....
        });

        // Gate::define('has_role', function($user, $role_name) {
        //     // check if the user has a role
        // });

        Gate::define('owner', function ($user) {
            return substr($user->email, -12) === 'data4you.cz';
        });
    }
}
