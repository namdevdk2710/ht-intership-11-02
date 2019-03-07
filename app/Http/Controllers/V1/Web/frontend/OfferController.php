<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Offer\OfferRepositoryInterface;
use App\Repositories\V1\Room\RoomRepositoryInterFace;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\About\AboutRepositoryInterface;

class OfferController extends Controller
{
    protected $repoOffer;
    protected $repoRoom;
    protected $repoFacilitie;
    protected $repoCuisine;
    protected $repoAbout;

    public function __construct(
        OfferRepositoryInterface $repoOffer,
        RoomRepositoryInterFace $repoRoom,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine,
        AboutRepositoryInterface $repoAbout
    ) {
        $this->repoOffer = $repoOffer;
        $this->repoRoom = $repoRoom;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $offers = $this->repoOffer->indexTop(2);
        $rooms = $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.offers.index', compact('offers', 'rooms', 'facilities', 'cuisines', 'about'));
    }

    public function detail($slug, $id)
    {
        $offerDetail = $this->repoOffer->detail($id);
        $rooms = $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.offers.detail', compact('offerDetail', 'rooms', 'facilities', 'cuisines', 'about'));
    }
}
