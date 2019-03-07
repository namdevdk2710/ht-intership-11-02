<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Room\RoomRepositoryInterface;
use App\Repositories\V1\RoomServiceDetail\RoomServiceDetailRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;

class RoomController extends Controller
{
    protected $repoRoom;
    protected $repoRoomServiceDetail;
    protected $repoFacilitie;
    protected $repoCuisine;

    public function __construct(
        RoomRepositoryInterface $repoRoom,
        RoomServiceDetailRepositoryInterface $repoRoomServiceDetail,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine
    ) {
        $this->repoRoom = $repoRoom;
        $this->repoRoomServiceDetail = $repoRoomServiceDetail;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.rooms.index', compact('rooms', 'facilities', 'cuisines'));
    }

    public function bookroom()
    {
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.book-rooms.index', compact('rooms', 'facilities', 'cuisines'));
    }

    public function detail($slug, $id)
    {
        $roomDetail = $this->repoRoom->detail($id);
        $anotherrooms = $this->repoRoom->anotherRoom($id);
        $roomservice = $this->repoRoomServiceDetail->roomServices($id);
        $rooms= $this->repoRoom->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.rooms.detail', compact(
            'roomDetail',
            'anotherrooms',
            'roomservice',
            'rooms',
            'facilities',
            'cuisines'
        ));
    }
}
