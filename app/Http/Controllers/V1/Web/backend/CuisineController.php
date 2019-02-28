<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Cuisines\CreateCuisineRequest;
use App\Http\Requests\Cuisines\EditCuisineRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterFace;
use App\Models\Cuisine;
use Illuminate\Support\Collection;

class CuisineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoCuisine;

    public function __construct(CuisineRepositoryInterFace $repoCuisine)
    {
        $this->repoCuisine = $repoCuisine;
    }

    public function index(Request $request)
    {
        $cuisines = $this->repoCuisine->paginate();
        if ($request['key']) {
            $cuisines = $this->repoCuisine->search($request['key']);
        }

        return view('backend.cuisines.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cuisines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCuisineRequest $request)
    {
        $this->repoCuisine->store($request->all());

        return redirect()->route('cuisine.index')->with('msg', 'Creation successful');
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
        $cuisine = $this->repoCuisine->find($id);

        return view('backend.cuisines.edit', compact('cuisine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCuisineRequest $request, $id)
    {
        $data = $request->all();
        $this->repoCuisine->update($id, $data);

        return redirect()->route('cuisine.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoCuisine->delete($id);

        return redirect()->route('cuisine.index')->with('msg', 'Delete successful');
    }
}
