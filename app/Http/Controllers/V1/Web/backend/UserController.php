<?php

namespace App\Http\Controllers\V1\Web\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Models\User;
use Illuminate\Support\Collection;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\EditUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoUser;

    public function __construct(UserRepositoryInterFace $repositoryUser)
    {
        $this->repoUser = $repositoryUser;
    }

    public function index(Request $request)
    {
        $users = $this->repoUser->paginate();

        if ($request['key']) {
            $users = $this->repoUser->search($request['key']);
        }

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $this->repoUser->store($request->all());

        return redirect()->route('user.index')->with('msg', 'Creation successful');
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
        $user = $this->repoUser->find($id);

        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $data = $request->all();
        $this->repoUser->update($id, $data);
        return redirect()->route('user.index')->with('msg', 'Edit successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoUser->delete($id);

        return redirect()->route('user.index')->with('msg', 'Delete successful');
    }
}
