<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterface;

class CuisineDetailController extends Controller
{
    protected $repoCuisineDetail;

    public function __construct(CuisineDetailRepositoryInterface $repoCuisineDetail)
    {
        $this->repoCuisineDetail = $repoCuisineDetail;
    }

    public function index()
    {
        $cuisinedetails = $this->repoCuisineDetail->index();

        return view('frontend.cuisine-details.index', compact('cuisinedetails'));
    }
}
