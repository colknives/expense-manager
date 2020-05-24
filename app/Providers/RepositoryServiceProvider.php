<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Repositories\ExpenseCategoryRepository;
use App\Repositories\ExpenseRepository;

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
        $this->app->singleton(ExpenseCategoryRepository::class, \App\Repositories\Mysql\ExpenseCategoryRepository::class);
        $this->app->singleton(ExpenseRepository::class, \App\Repositories\Mysql\ExpenseRepository::class);
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
