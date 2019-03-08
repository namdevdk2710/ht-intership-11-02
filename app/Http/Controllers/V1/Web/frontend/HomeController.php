<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Repositories\V1\About\AboutRepositoryInterFace;
use App\Repositories\V1\Destination\DestinationRepositoryInterFace;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Offer\OfferRepositoryInterFace;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoAbout;
    protected $repoFacilitie;
    protected $repoCuisine;
    protected $repoDestination;
    protected $repoFacilitieDetail;
    protected $repoOffer;
    protected $repoIntroduce;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        AboutRepositoryInterFace $repoAbout,
        DestinationRepositoryInterFace $repoDestination,
        FacilitieDetailRepositoryInterface $repoFacilitieDetail,
        FacilitieRepositoryInterface $repoFacilitie,
        OfferRepositoryInterFace $repoOffer,
        IntroduceRepositoryInterface $repoIntroduce,
        CuisineRepositoryInterface $repoCuisine
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoAbout = $repoAbout;
        $this->repoDestination = $repoDestination;
        $this->repoFacilitieDetail = $repoFacilitieDetail;
        $this->repoOffer = $repoOffer;
        $this->repoIntroduce = $repoIntroduce;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $banners = $this->repoBanner->indexTop(2, ['image', 'description', 'link']);
        $abouts = $this->repoAbout->indexTop(2, ['id','name', 'image', 'description', 'slug']);
        $destinations = $this->repoDestination->indexTop(1, ['name', 'image', 'description']);
        $facilitieDetails = $this->repoFacilitieDetail->indexTop(1, ['id','name', 'image', 'description']);
        $offers = $this->repoOffer->indexTop(1, ['id', 'name', 'image', 'content']);
        $introduces = $this->repoIntroduce->indexTop(2);
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.homes.index', compact(
            'banners',
            'abouts',
            'destinations',
            'facilitieDetails',
            'offers',
            'introduces',
            'facilities',
            'cuisines'
        ));
    }

    public function detailAbout($slug, $id)
    {
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.abouts.detail', compact('facilities','cuisines'));
    }

    public function getdestination()
    {
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.destinations.index', compact('facilities','cuisines'));
    }
}
