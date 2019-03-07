<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Room\RoomRepositoryInterface;
use App\Repositories\V1\RoomServiceDetail\RoomServiceDetailRepositoryInterface;

class RoomController extends Controller
{
    protected $repoRoom;
    protected $repoRoomServiceDetail;

    public function __construct(
        RoomRepositoryInterface $repoRoom,
        RoomServiceDetailRepositoryInterface $repoRoomServiceDetail
    ) {
        $this->repoRoom = $repoRoom;
        $this->repoRoomServiceDetail = $repoRoomServiceDetail;
    }

    public function index()
    {
        $rooms= $this->repoRoom->index();

        return view('frontend.rooms.index', compact('rooms'));
    }

    public function bookroom()
    {
        return view('frontend.book-rooms.index');
    }

    public function detail($slug, $id)
    {
        $roomDetail = $this->repoRoom->detail($id);
        $anotherrooms = $this->repoRoom->anotherRoom($id);
        $roomservice = $this->repoRoomServiceDetail->roomServices($id);

        return view('frontend.rooms.detail', compact('roomDetail', 'anotherrooms', 'roomservice'));
    }
}
