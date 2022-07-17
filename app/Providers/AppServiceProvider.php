<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\PermissionRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
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

        $this->app->singleton(
            ProductRepositoryInterface::class, 
            ProductRepository::class
        );
        $this->app->singleton(
            CategoryRepositoryInterface::class, 
            CategoryRepository::class
        );
        $this->app->singleton(
            RoleRepositoryInterface::class, 
            RoleRepository::class
        );
        $this->app->singleton(
            UserRepositoryInterface::class, 
            UserRepository::class
        );

        $this->app->singleton(
            PermissionRepositoryInterface::class, 
            PermissionRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
