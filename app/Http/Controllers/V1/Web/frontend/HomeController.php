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
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoAbout;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        AboutRepositoryInterFace $repoAbout,
        DestinationRepositoryInterFace $repoDestination,
        FacilitieDetailRepositoryInterface $repoFacilitieDetail,
        OfferRepositoryInterFace $repoOffer,
        IntroduceRepositoryInterface $repoIntroduce
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoAbout = $repoAbout;
        $this->repoDestination = $repoDestination;
        $this->repoFacilitieDetail = $repoFacilitieDetail;
        $this->repoOffer = $repoOffer;
        $this->repoIntroduce = $repoIntroduce;
    }

    public function index()
    {
        $banners = $this->repoBanner->indexTop(2, ['image', 'description', 'link']);
        $abouts = $this->repoAbout->indexTop(2, ['name', 'image', 'description', 'slug']);
        $destinations = $this->repoDestination->indexTop(1, ['name', 'image', 'description']);
        $facilitieDetails = $this->repoFacilitieDetail->indexTop(1, ['name', 'image', 'description']);
        $offers = $this->repoOffer->indexTop(1, ['name', 'image', 'content']);
        $introduces = $this->repoIntroduce->indexTop(2);

        return view('frontend.homes.index', compact('banners', 'abouts', 'destinations', 'facilitieDetails', 'offers', 'introduces'));
    }
}
