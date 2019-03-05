<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;

    public function __construct(BannerRepositoryInterFace $repoBanner)
    {
        $this->repoBanner = $repoBanner;
    }

    public function index()
    {
        $banners = $this->repoBanner->indexTop(2,['image','description','link']);

        return view('frontend.homes.index', compact('banners'));
    }
}
