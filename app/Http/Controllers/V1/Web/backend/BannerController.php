<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Http\Requests\BannerRequest;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function update(BannerRequest $request, $id)
    {
        // $banner = $this->repository->find($id);

        // $data = $request->all();

        // $result = $this->repository->update($banner->id, $data);

        // if ($result) {
        //     return redirect()->route('banner.edit')->with('status', 'Successfull!');
        // }
        // return back()->withErrors('Update failed!');
        $banner = $this->repository->find($id);
        try {
            $data = $request->all();
            $result = $this->repository->update($banner->id, $data);

            if ($result) {
                return redirect()->route('banner.index')->with('status', 'Successfull!');
            }
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors('Update failed!');
        }
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
