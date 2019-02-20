<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\V1\Todo\TodoRepository;
use App\Repositories\V1\Todo\TodoRepositoryInterface;
use App\Repositories\V1\Banner\BannerRepository;
use App\Repositories\V1\Banner\BannerRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
    }
}
