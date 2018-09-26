<?php

namespace App\Providers;
use Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Repositories\Interfaces\UserRepositoryInterface', function () {
                    $baseRepo = new \App\Repositories\EloquentUserRepository(new \App\User);
                    $cachingRepo = new \App\Repositories\Decorators\CachingUserRepository($baseRepo, $this->app['cache.store']);
                    return $cachingRepo;
                });
    }
}
