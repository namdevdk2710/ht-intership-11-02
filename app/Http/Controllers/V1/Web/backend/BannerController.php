<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Banners\CreateBannerRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Http\Requests\Banners\EditBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Collection;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repository;

    public function __construct(BannerRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $banners = $this->repository->paginate();

        if ($request['key']) {
            $banners = $this->repository->search($request['key']);
        }

        return view('backend.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBannerRequest $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('banner.index')->with('msg', 'Creation successful');
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
        $banner = $this->repository->find($id);

        return view('backend.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBannerRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($id, $data);

        return redirect()->route('banner.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('banner.index')->with('msg', 'Delete successful');
    }
}
