<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Abouts\CreateAboutRequest;
use App\Http\Requests\Abouts\EditAboutRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\About\AboutRepositoryInterFace;
use App\Models\About;
use Illuminate\Support\Collection;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoAbout;

    public function __construct(AboutRepositoryInterFace $repositoryAbout)
    {
        $this->repoAbout = $repositoryAbout;
    }

    public function index(Request $request)
    {
        $abouts = $this->repoAbout->paginate();

        if ($request['key']) {
            $abouts = $this->repoAbout->search($request['key']);
        }

        return view('backend.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutRequest $request)
    {
        $this->repoAbout->store($request->all());

        return redirect()->route('about.index')->with('msg', 'Creation successful');
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
        $about = $this->repoAbout->find($id);

        return view('backend.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAboutRequest $request, $id)
    {
        $data = $request->all();
        $this->repoAbout->update($id, $data);

        return redirect()->route('about.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoAbout->delete($id);

        return redirect()->route('about.index')->with('msg', 'Delete successful');
    }
}
