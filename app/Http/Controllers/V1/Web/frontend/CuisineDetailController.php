<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterface;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;


class CuisineDetailController extends Controller
{
    protected $repoCuisine;
    protected $repoCuisineDetail;
    protected $repoFacilitie;


    public function __construct(
        CuisineRepositoryInterface $repoCuisine,
        CuisineDetailRepositoryInterface $repoCuisineDetail,
        FacilitieRepositoryInterface $repoFacilitie

    ) {
        $this->repoCuisine = $repoCuisine;
        $this->repoCuisineDetail = $repoCuisineDetail;
        $this->repoFacilitie = $repoFacilitie;

    }

    public function index()
    {
        $cuisines= $this->repoCuisine->test();

        $facilities = $this->repoFacilitie->index();

        return view('frontend.cuisine-details.index', compact('cuisines', 'facilities'));
    }
}
