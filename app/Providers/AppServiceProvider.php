<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\V1\Todo\TodoRepository;
use App\Repositories\V1\Todo\TodoRepositoryInterface;
use App\Repositories\V1\Banner\BannerRepository;
use App\Repositories\V1\Banner\BannerRepositoryInterface;
use App\Repositories\V1\Gallery\GalleryRepository;
use App\Repositories\V1\Gallery\GalleryRepositoryInterface;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepository;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepositoryInterface;
use App\Repositories\V1\Module\ModuleRepository;
use App\Repositories\V1\Module\ModuleRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepository;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
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
        $this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
        $this->app->bind(GalleryDetailRepositoryInterface::class, GalleryDetailRepository::class);
        $this->app->bind(ModuleRepositoryInterface::class, ModuleRepository::class);
        $this->app->bind(CuisineRepositoryInterface::class, CuisineRepository::class);
    }
}
