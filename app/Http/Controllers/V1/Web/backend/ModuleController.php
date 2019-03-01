<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Requests\Modules\CreateModuleRequest;
use App\Http\Requests\Modules\EditModuleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Module\ModuleRepositoryInterFace;
use App\Models\Module;
use Illuminate\Support\Collection;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoModule;

    public function __construct(ModuleRepositoryInterFace $repositoryModule)
    {
        $this->repoModule = $repositoryModule;
    }

    public function index(Request $request)
    {
        $modules = $this->repoModule->paginate();

        if ($request['key']) {
            $modules = $this->repoModule->search($request['key']);
        }

        return view('backend.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateModuleRequest $request)
    {
        $this->repoModule->store($request->all());

        return redirect()->route('module.index')->with('msg', 'Creation successful');
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
        $module = $this->repoModule->find($id);

        return view('backend.modules.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditModuleRequest $request, $id)
    {
        $data = $request->all();
        $this->repoModule->update($id, $data);

        return redirect()->route('module.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoModule->delete($id);

        return redirect()->route('module.index')->with('msg', 'Delete successful');
    }

    public function changestatus(Request $request)
    {
        $data = $request->all();

        return $this->repoModule->changestatus($data);
    }
}
