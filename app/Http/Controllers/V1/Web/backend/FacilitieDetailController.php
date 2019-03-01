<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\FacilitieDetail\FacilitieDetailRepositoryInterFace;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterFace;
use App\Models\FacilitieDetail;
use Illuminate\Support\Collection;
use App\Http\Requests\FacilitieDetails\CreateFacilitieDetailRequest;

class FacilitieDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoFacilitieDetail;

    public function __construct(
        FacilitieDetailRepositoryInterFace $repoFacilitieDetail,
        FacilitieRepositoryInterFace $repoFacilitie
    ) {
        $this->repoFacilitieDetail = $repoFacilitieDetail;
        $this->repoFacilitie = $repoFacilitie;
    }


    public function index(Request $request)
    {
        $facilitieDetails = $this->repoFacilitieDetail->paginate();

        if ($request['key']) {
            $facilitieDetails = $this->repoFacilitieDetail->search($request['key']);
        }

        return view('backend.facilitie-details.index', compact('facilitieDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilitieDetails = $this->repoFacilitie->listCreate();

        return view('backend.facilitie-details.create', compact('facilitieDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFacilitieDetailRequest $request)
    {
        $this->repoFacilitieDetail->store($request->all());

        return redirect()->route('facilitie_detail.index')->with('msg', 'Creation successful');
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
    public function update(Request $request, $id)
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
