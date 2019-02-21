<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\DocumentoRepository::class, \App\Repositories\DocumentoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClienteRepository::class, \App\Repositories\ClienteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoriaRepository::class, \App\Repositories\CategoriaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
