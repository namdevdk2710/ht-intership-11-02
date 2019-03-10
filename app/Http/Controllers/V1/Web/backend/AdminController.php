<?php
namespace App\Http\Controllers\V1\Web\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\V1\User\UserRepositoryInterFace;
use App\Http\Requests\LoginRequest;

class AdminController extends Controller
{
    protected $repository;

    public function __construct(UserRepositoryInterFace $repository)
    {
        $this->repository = $repository;
    }

    public function getLogin()
    {
        if (!Auth::user()) {
            return view('backend.login');
        }
        return redirect()->route('home.index');
    }

    public function postLogin(LoginRequest $request)
    {
        $rs = $this->repository->login($request);

        if ($rs == 'email') {
            return redirect()->back()->with('msg', 'Email không tồn tại !');
        } else {
            return redirect()->back()->with('msg', 'Password không chính xác !');
        }

        return redirect()->route('home.index')->with('msg', 'Logged in successfully !');
    }
}
