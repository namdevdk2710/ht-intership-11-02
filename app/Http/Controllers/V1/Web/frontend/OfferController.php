<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Offer\OfferRepositoryInterface;

class OfferController extends Controller
{
    protected $repoOffer;

    public function __construct(OfferRepositoryInterface $repoOffer)
    {
        $this->repoOffer = $repoOffer;
    }

    public function index()
    {
        $offers = $this->repoOffer->indexTop(2);

        return view('frontend.offers.index', compact('offers'));
    }

    public function detail($slug,$id)
    {
        $offerDetail = $this->repoOffer->detail($id);

        return view('frontend.offers.detail', compact('offerDetail'));
    }
}
