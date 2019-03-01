<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Destinations\CreateDestinationRequest;
use App\Http\Requests\Destinations\EditDestinationRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Destination\DestinationRepositoryInterFace;
use App\Models\Destination;
use Illuminate\Support\Collection;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoDestination;

    public function __construct(DestinationRepositoryInterFace $repositoryDestination)
    {
        $this->repoDestination = $repositoryDestination;
    }

    public function index(Request $request)
    {
        $destinations = $this->repoDestination->paginate();

        if ($request['key']) {
            $destinations = $this->repoDestination->search($request['key']);
        }

        return view('backend.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDestinationRequest $request)
    {
        $this->repoDestination->store($request->all());

        return redirect()->route('destination.index')->with('msg', 'Creation successful');
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
        $destination = $this->repoDestination->find($id);

        return view('backend.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDestinationRequest $request, $id)
    {
        $data = $request->all();
        $this->repoDestination->update($id, $data);

        return redirect()->route('destination.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoDestination->delete($id);

        return redirect()->route('destination.index')->with('msg', 'Delete successful');
    }
}
