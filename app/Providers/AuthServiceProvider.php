<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('list_product', function ($user)
        {
            return $user->checkPermissionAccess('list_product');
        });

        Gate::define('create_product', function ($user)
        {
            return $user->checkPermissionAccess('create_product');
        });

        Gate::define('update_product', function ($user)
        {
            return $user->checkPermissionAccess('update_product');
        });

        Gate::define('delete_product', function ($user)
        {
            return $user->checkPermissionAccess('delete_product');
        });
    }
}
