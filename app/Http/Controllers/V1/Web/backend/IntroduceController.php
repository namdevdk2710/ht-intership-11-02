<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Introduces\CreateIntroduceRequest;
use App\Http\Requests\Introduces\EditIntroduceRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterFace;
use App\Models\Introduce;
use Illuminate\Support\Collection;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoIntroduce;

    public function __construct(IntroduceRepositoryInterFace $repositoryIntroduce)
    {
        $this->repoIntroduce = $repositoryIntroduce;
    }

    public function index()
    {
        $introduces = $this->repoIntroduce->paginate();

        return view('backend.introduces.index', compact('introduces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.introduces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIntroduceRequest $request)
    {
        $this->repoIntroduce->store($request->all());

        return redirect()->route('introduce.index')->with('msg', 'Creation successful');
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
        $introduce = $this->repoIntroduce->find($id);

        return view('backend.introduces.edit', compact('introduce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditIntroduceRequest $request, $id)
    {
        $data = $request->all();
        $this->repoIntroduce->update($id, $data);

        return redirect()->route('introduce.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoIntroduce->delete($id);

        return redirect()->route('introduce.index')->with('msg', 'Delete successful');
    }
}
