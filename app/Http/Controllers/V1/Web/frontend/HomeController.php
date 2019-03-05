<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Repositories\V1\About\AboutRepositoryInterFace;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoAbout;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        AboutRepositoryInterFace $repoAbout
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoAbout = $repoAbout;
    }

    public function index()
    {
        $banners = $this->repoBanner->indexTop(2,['image', 'description', 'link']);
        $abouts = $this->repoAbout->indexTop(2,['name', 'image', 'description', 'slug']);

        return view('frontend.homes.index', compact('banners', 'abouts'));
    }
}
