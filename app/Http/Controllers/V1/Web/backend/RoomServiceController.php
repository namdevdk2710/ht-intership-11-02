<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\RoomService\RoomServiceRepositoryInterFace;
use App\Models\RoomService;
use Illuminate\Support\Collection;
use App\Http\Requests\RoomServices\CreateRoomServiceRequest;
use App\Http\Requests\RoomServices\EditRoomServiceRequest;

class RoomServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoRoomService;

    public function __construct(RoomServiceRepositoryInterFace $repoRoomService)
    {
        $this->repoRoomService = $repoRoomService;
    }

    public function index(Request $request)
    {
        $roomservices = $this->repoRoomService->paginate();
        if ($request['key']) {
            $roomservices = $this->repoRoomService->search($request['key']);
        }

        return view('backend.room-services.index', compact('roomservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.room-services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditRoomServiceRequest $request)
    {
        $this->repoRoomService->store($request->all());

        return redirect()->route('room_service.index')->with('msg', 'Creation successful');
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
        $roomservice = $this->repoRoomService->find($id);

        return view('backend.room-services.edit', compact('roomservice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRoomServiceRequest $request, $id)
    {
        $data = $request->all();
        $this->repoRoomService->update($id, $data);
        return redirect()->route('room_service.index')->with('msg', 'Edit successful');
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
}
