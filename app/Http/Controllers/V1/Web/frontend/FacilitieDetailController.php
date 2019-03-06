<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;

class FacilitieDetailController extends Controller
{
    protected $repoFacilitie;
    protected $repoFacilitieDetail;

    public function __construct(
        FacilitieRepositoryInterface $repoFacilitie,
        FacilitieDetailRepositoryInterface $repoFacilitieDetail
    ) {
        $this->repoFacilitie = $repoFacilitie;
        $this->repoFacilitieDetail = $repoFacilitieDetail;
    }

    public function index()
    {
        $facilities= $this->repoFacilitie->listpage();

        return view('frontend.facilitie-details.index', compact('facilities'));
    }
}
