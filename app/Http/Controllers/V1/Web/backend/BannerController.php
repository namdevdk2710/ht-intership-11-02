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

    public function index()
    {
        $banners = $this->repository->paginate();

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
        $request->session()->flash('msg', 'Creation successful');

        return redirect()->route('banner.index');
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
        // return view('backend.banners.index', compact('banners'));
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
        return view( 'backend.banners.edit', compact('banner'));
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

        $request->session()->flash('msg', 'Update Successful');

        return redirect()->route('banner.index');

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
