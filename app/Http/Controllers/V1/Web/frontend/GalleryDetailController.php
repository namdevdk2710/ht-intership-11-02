<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepositoryInterface;

class GalleryDetailController extends Controller
{
    protected $repoBanner;
    protected $repoAbout;

    public function __construct(GalleryDetailRepositoryInterface $repoGalleryDetail)
    {
        $this->repoGalleryDetail = $repoGalleryDetail;
    }

    public function index()
    {
        $galleryDetails = $this->repoGalleryDetail->index();

        return view('frontend.gallery-details.index', compact('galleryDetails'));
    }
}
