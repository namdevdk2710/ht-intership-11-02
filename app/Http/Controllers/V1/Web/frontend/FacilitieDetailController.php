<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;

class FacilitieDetailController extends Controller
{
    protected $repoFacilitie;
    protected $repoFacilitieDetail;
    protected $repoCuisine;

    public function __construct(
        FacilitieRepositoryInterface $repoFacilitie,
        FacilitieDetailRepositoryInterface $repoFacilitieDetail,
        CuisineRepositoryInterface $repoCuisine

    ) {
        $this->repoFacilitie = $repoFacilitie;
        $this->repoFacilitieDetail = $repoFacilitieDetail;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $facilities= $this->repoFacilitie->listpage();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.facilitie-details.index', compact('facilities','cuisines'));
    }
}
