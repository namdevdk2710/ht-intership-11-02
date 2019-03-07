<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Room\RoomRepositoryInterface;
use App\Repositories\V1\RoomServiceDetail\RoomServiceDetailRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;
use App\Repositories\V1\About\AboutRepositoryInterface;

class RoomController extends Controller
{
    protected $repoRoom;
    protected $repoRoomServiceDetail;
    protected $repoFacilitie;
    protected $repoCuisine;
    protected $repoAbout;

    public function __construct(
        RoomRepositoryInterface $repoRoom,
        RoomServiceDetailRepositoryInterface $repoRoomServiceDetail,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine,
        AboutRepositoryInterface $repoAbout
    ) {
        $this->repoRoom = $repoRoom;
        $this->repoRoomServiceDetail = $repoRoomServiceDetail;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.rooms.index', compact('rooms', 'facilities', 'cuisines', 'about'));
    }

    public function bookroom()
    {
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.book-rooms.index', compact('rooms', 'facilities', 'cuisines', 'about'));
    }

    public function detail($slug, $id)
    {
        $roomDetail = $this->repoRoom->detail($id);
        $anotherrooms = $this->repoRoom->anotherRoom($id);
        $roomservice = $this->repoRoomServiceDetail->roomServices($id);
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();
        $about = $this->repoAbout->index();

        return view('frontend.rooms.detail', compact(
            'roomDetail',
            'anotherrooms',
            'roomservice',
            'rooms',
            'facilities',
            'cuisines',
            'about'
        ));
    }
}
