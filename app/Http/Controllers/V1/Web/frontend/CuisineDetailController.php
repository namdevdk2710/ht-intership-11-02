<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterface;

class CuisineDetailController extends Controller
{
    protected $repoCuisine;
    protected $repoCuisineDetail;

    public function __construct(
        CuisineRepositoryInterface $repoCuisine,
        CuisineDetailRepositoryInterface $repoCuisineDetail
    ) {
        $this->repoCuisine = $repoCuisine;
        $this->repoCuisineDetail = $repoCuisineDetail;
    }

    public function index()
    {
        $cuisines= $this->repoCuisine->test();

        return view('frontend.cuisine-details.index', compact('cuisines'));
    }
}
