<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Gallerys\CreateGalleryRequest;
use App\Http\Requests\Gallerys\EditGalleryRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Gallery\GalleryRepositoryInterFace;
use App\Models\Gallery;
use Illuminate\Support\Collection;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoGallery;

    public function __construct(GalleryRepositoryInterFace $repositoryGallery)
    {
        $this->repoGallery = $repositoryGallery;
    }

    public function index()
    {
        $gallerys = $this->repoGallery->paginate();

        return view('backend.gallerys.index', compact('gallerys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallerys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryRequest $request)
    {
        $this->repoGallery->store($request->all());

        return redirect()->route('gallery.index')->with('msg', 'Creation Gallery successful');
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
        $gallery = $this->repoGallery->find($id);

        return view('backend.gallerys.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditGalleryRequest $request, $id)
    {
        $data = $request->all();
        $this->repoGallery->update($id, $data);

        return redirect()->route('gallery.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoGallery->delete($id);

        return redirect()->route('gallery.index')->with('msg', 'Delete Gallery successful');
    }
}
