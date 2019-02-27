<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\GalleryDetails\CreateGalleryDetailRequest;
use App\Http\Requests\GalleryDetails\EditGalleryDetailRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepositoryInterFace;
use App\Repositories\V1\Gallery\GalleryRepositoryInterFace;
use App\Models\GalleryDetail;
use Illuminate\Support\Collection;

class GalleryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoGalleryDetail;
    protected $repoGallery;
    public function __construct
    (
        GalleryDetailRepositoryInterFace $repoGalleryDetail,
        GalleryRepositoryInterFace $repoGallery
    )
    {
        $this->repoGalleryDetail = $repoGalleryDetail;
        $this->repoGallery = $repoGallery;
    }

    public function index()
    {
        $galleryDetails = $this->repoGalleryDetail->paginate();

        return view('backend.gallery-details.index', compact('galleryDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleryDetails = $this->repoGallery->listCreate();

        return view('backend.gallery-details.create', compact('galleryDetails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryDetailRequest $request)
    {
        $this->repoGalleryDetail->store($request->all());

        return redirect()->route('gallery_detail.index')->with('msg', 'Creation successful');
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
        $galleryDetail = $this->repoGalleryDetail->find($id);

        return view('backend.gallery_detail.edit', compact('galleryDetail'));
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
        $data = $request->all();
        $this->repoGalleryDetail->update($id, $data);

        return redirect()->route('gallery_detail.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoGalleryDetail->delete($id);

        return redirect()->route('gallery_detail.index')->with('msg', 'Delete successful');
    }
}
