<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterFace;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterFace;
use App\Models\CuisineDetail;
use Illuminate\Support\Collection;
use App\Http\Requests\CuisineDetails\CreateCuisineDetailRequest;
use App\Http\Requests\CuisineDetails\EditCuisineDetailRequest;

class CuisineDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoCuisineDetail;

    public function __construct(
        CuisineDetailRepositoryInterFace $repoCuisineDetail,
        CuisineRepositoryInterFace $repoCuisine
    ) {
        $this->repoCuisineDetail = $repoCuisineDetail;
        $this->repoCuisine = $repoCuisine;
    }

    public function index(Request $request)
    {
        $cuisineDetails = $this->repoCuisineDetail->paginate();
        if ($request['key']) {
            $cuisineDetails = $this->repoCuisineDetail->search($request['key']);
        }

        return view('backend.cuisine-details.index', compact('cuisineDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuisineDetails = $this->repoCuisine->listCreate();

        return view('backend.cuisine-details.create', compact('cuisineDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCuisineDetailRequest $request)
    {
        $this->repoCuisineDetail->store($request->all());

        return redirect()->route('cuisine_detail.index')->with('msg', 'Creation successful');
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
        $cuisine = $this->repoCuisine->listCreate();
        $cuisineDetail = $this->repoCuisineDetail->find($id);

        return view('backend.cuisine-details.edit', compact('cuisineDetail', 'cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCuisineDetailRequest $request, $id)
    {
        $data = $request->all();
        $this->repoCuisineDetail->update($id, $data);

        return redirect()->route('cuisine_detail.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoCuisineDetail->delete($id);

        return redirect()->route('cuisine_detail.index')->with('msg', 'Delete successful');
    }
}
