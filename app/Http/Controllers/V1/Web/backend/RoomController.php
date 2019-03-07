<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Rooms\CreateRoomRequest;
use App\Http\Requests\Rooms\EditRoomRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Room\RoomRepositoryInterFace;
use App\Repositories\V1\RoomService\RoomServiceRepositoryInterface;
use App\Repositories\V1\RoomServiceDetail\RoomServiceDetailRepositoryInterface;
use App\Models\Room;
use Illuminate\Support\Collection;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoRoom;
    protected $repoRoomService;
    protected $repoRoomServiceDetail;

    public function __construct(
        RoomRepositoryInterFace $repoRoom,
        RoomServiceRepositoryInterface $repoRoomService,
        RoomServiceDetailRepositoryInterface $repoRoomServiceDetail
    ) {
        $this->repoRoom = $repoRoom;
        $this->repoRoomService = $repoRoomService;
        $this->repoRoomServiceDetail = $repoRoomServiceDetail;
    }

    public function index()
    {
        $rooms = $this->repoRoom->paginate();

        return view('backend.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repoRoomServices = $this->repoRoomService->index();

        return view('backend.rooms.create', compact('repoRoomServices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomRequest $request)
    {
        $idRoom = $this->repoRoom->store($request->except('room-service'));
        if ($request->only('room-service')) {
            $this->repoRoomServiceDetail->storeRoomServiceDetail($idRoom, $request->only('room-service'));

            return redirect()->route('room.index')->with('msg', 'Creation successful');
        } else {
            return redirect()->route('room.index')->with('msg', 'Creation successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = $this->repoRoom->find($id);
        $roomServices = $this->repoRoomService->index();
        $oldRoomServices = $this->repoRoomServiceDetail->initRoomServiceDetail($id);

        return view('backend.rooms.edit', compact('room', 'roomServices', 'oldRoomServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoomRequest $request, $id)
    {
        $this->repoRoom->update($id, $request->except('room-service'));
        $this->repoRoomServiceDetail->updateRoomServiceDetail($id, $request->only('room-service'));

        return redirect()->route('room.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changestatus(Request $request)
    {
        $data = $request->all();

        return $this->repoRoom->changestatus($data);
    }
}
