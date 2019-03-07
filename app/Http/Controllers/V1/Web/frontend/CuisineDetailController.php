<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterface;
use App\Repositories\V1\Room\RoomRepositoryInterFace;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\About\AboutRepositoryInterface;

class CuisineDetailController extends Controller
{
    protected $repoCuisine;
    protected $repoCuisineDetail;
    protected $repoRoom;
    protected $repoFacilitie;
    protected $repoAbout;

    public function __construct(
        CuisineRepositoryInterface $repoCuisine,
        CuisineDetailRepositoryInterface $repoCuisineDetail,
        RoomRepositoryInterFace $repoRoom,
        FacilitieRepositoryInterface $repoFacilitie,
        AboutRepositoryInterface $repoAbout
    ) {
        $this->repoCuisine = $repoCuisine;
        $this->repoCuisineDetail = $repoCuisineDetail;
        $this->repoRoom = $repoRoom;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $cuisines= $this->repoCuisine->test();
        $rooms = $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $about = $this->repoAbout->index();

        return view('frontend.cuisine-details.index', compact('cuisines', 'rooms', 'facilities', 'about'));
    }
}
