<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RoleRepository::class, \App\Repositories\Mysql\RoleRepository::class);
        $this->app->singleton(UserRepository::class, \App\Repositories\Mysql\UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
