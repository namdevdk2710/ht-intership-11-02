<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Room\RoomRepositoryInterFace;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\About\AboutRepositoryInterface;

class FacilitieDetailController extends Controller
{
    protected $repoFacilitie;
    protected $repoFacilitieDetail;
    protected $repoRoom;
    protected $repoCuisine;
    protected $repoAbout;

    public function __construct(
        FacilitieRepositoryInterface $repoFacilitie,
        FacilitieDetailRepositoryInterface $repoFacilitieDetail,
        RoomRepositoryInterFace $repoRoom,
        CuisineRepositoryInterface $repoCuisine,
        AboutRepositoryInterface $repoAbout

    ) {
        $this->repoFacilitie = $repoFacilitie;
        $this->repoFacilitieDetail = $repoFacilitieDetail;
        $this->repoRoom = $repoRoom;
        $this->repoCuisine = $repoCuisine;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $facilities= $this->repoFacilitie->listpage();
        $rooms = $this->repoRoom->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.facilitie-details.index', compact('facilities', 'rooms', 'cuisines', 'about'));
    }
}
