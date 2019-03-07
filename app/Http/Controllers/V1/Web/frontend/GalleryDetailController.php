<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepositoryInterface;
use App\Repositories\V1\Room\RoomRepositoryInterFace;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\About\AboutRepositoryInterface;

class GalleryDetailController extends Controller
{
    protected $repoGalleryDetail;
    protected $repoRoom;
    protected $repoFacilitie;
    protected $repoCuisine;
    protected $repoAbout;

    public function __construct(
        GalleryDetailRepositoryInterface $repoGalleryDetail,
        RoomRepositoryInterFace $repoRoom,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine,
        AboutRepositoryInterface $repoAbout
    ) {
        $this->repoGalleryDetail = $repoGalleryDetail;
        $this->repoRoom = $repoRoom;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $galleryDetails = $this->repoGalleryDetail->index();
        $rooms = $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.gallery-details.index', compact('galleryDetails', 'rooms', 'facilities', 'cuisines', 'about'));
    }
}
