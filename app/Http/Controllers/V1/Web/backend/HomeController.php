<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Contact\ContactRepositoryInterFace;
use App\Repositories\V1\Offer\OfferRepositoryInterFace;

class HomeController extends Controller
{
    protected $repoOffer;
    protected $repoContact;

    public function __construct(
        OfferRepositoryInterFace $repositoryOffer,
        ContactRepositoryInterFace $repositoryContact
    ) {
        $this->repoOffer = $repositoryOffer;
        $this->repoContact = $repositoryContact;
    }

    public function index()
    {
        $contacts = $this->repoContact->paginate(5);
        $offers = $this->repoOffer->paginate(5);

        return view('backend.home.index', compact('offers', 'contacts'));
    }
}
