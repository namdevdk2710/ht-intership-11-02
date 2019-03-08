<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Offer\OfferRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;

class OfferController extends Controller
{
    protected $repoOffer;
    protected $repoFacilitie;
    protected $repoCuisine;

    public function __construct(
        OfferRepositoryInterface $repoOffer,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine
    ) {
        $this->repoOffer = $repoOffer;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $offers = $this->repoOffer->indexTop(2);
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.offers.index', compact('offers', 'facilities', 'cuisines'));
    }

    public function detail($slug, $id)
    {
        $offerDetail = $this->repoOffer->detail($id);
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.offers.detail', compact('offerDetail', 'facilities', 'cuisines'));
    }
}
