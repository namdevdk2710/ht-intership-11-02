<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterFace;
use App\Models\Facilitie;
use Illuminate\Support\Collection;
use App\Http\Requests\Facilities\CreateFacilitieRequest;
use App\Http\Requests\Facilities\EditFacilitieRequest;

class FacilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoFacilitie;

    public function __construct(FacilitieRepositoryInterFace $repoFacilitie)
    {
        $this->repoFacilitie = $repoFacilitie;
    }

    public function index(Request $request)
    {
        $facilities = $this->repoFacilitie->paginate();
        if ($request['key']) {
            $facilities = $this->repoFacilitie->search($request['key']);
        }

        return view('backend.facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFacilitieRequest $request)
    {
        $this->repoFacilitie->store($request->all());

        return redirect()->route('facilitie.index')->with('msg', 'Creation successful');
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
        $facilitie = $this->repoFacilitie->find($id);

        return view('backend.facilities.edit', compact('facilitie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFacilitieRequest $request, $id)
    {
        $data = $request->all();
        $this->repoFacilitie->update($id, $data);

        return redirect()->route('facilitie.index')->with('msg', 'Edit successful');
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
