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
use App\Repositories\V1\CuisineDetail\CuisineDetailRepository;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterface;
use App\Repositories\V1\About\AboutRepository;
use App\Repositories\V1\About\AboutRepositoryInterface;
use App\Repositories\V1\Introduce\IntroduceRepository;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepository;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Contact\ContactRepository;
use App\Repositories\V1\Contact\ContactRepositoryInterface;
use App\Repositories\V1\Offer\OfferRepository;
use App\Repositories\V1\Offer\OfferRepositoryInterface;
use App\Repositories\V1\Destination\DestinationRepository;
use App\Repositories\V1\Destination\DestinationRepositoryInterface;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepository;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Room\RoomRepository;
use App\Repositories\V1\Room\RoomRepositoryInterface;
use App\Repositories\V1\User\UserRepository;
use App\Repositories\V1\User\UserRepositoryInterface;
use App\Repositories\V1\RoomService\RoomServiceRepository;
use App\Repositories\V1\RoomService\RoomServiceRepositoryInterface;

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
        $this->app->bind(CuisineDetailRepositoryInterface::class, CuisineDetailRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(IntroduceRepositoryInterface::class, IntroduceRepository::class);
        $this->app->bind(FacilitieRepositoryInterface::class, FacilitieRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
        $this->app->bind(DestinationRepositoryInterface::class, DestinationRepository::class);
        $this->app->bind(FacilitieDetailRepositoryInterface::class, FacilitieDetailRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoomServiceRepositoryInterface::class, RoomServiceRepository::class);
    }
}
