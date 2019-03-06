<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Room\RoomRepositoryInterface;

class RoomController extends Controller
{
    protected $repoRoom;

    public function __construct(
        RoomRepositoryInterface $repoRoom
    ) {
        $this->repoRoom = $repoRoom;
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
        return view('frontend.rooms.detail');
    }

}
