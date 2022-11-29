<?php

namespace App\Providers;

use App\Policies\ProductPolicy;
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

        Gate::define('list_product', [ProductPolicy::class, 'viewAny']);
        Gate::define('create_product', [ProductPolicy::class, 'create']);
        Gate::define('update_product', [ProductPolicy::class, 'update']);
        Gate::define('delete_product', [ProductPolicy::class, 'define']);
    }
}
