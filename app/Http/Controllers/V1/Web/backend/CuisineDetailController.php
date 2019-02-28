<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\CuisineDetail\CuisineDetailRepositoryInterFace;
use App\Models\CuisineDetail;
use Illuminate\Support\Collection;

class CuisineDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoCuisineDetail;

    public function __construct(
        CuisineDetailRepositoryInterFace $repoCuisineDetail
    ) {
        $this->repoCuisineDetail = $repoCuisineDetail;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryDetailRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditGalleryDetailRequest $request, $id)
    {
        //
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
