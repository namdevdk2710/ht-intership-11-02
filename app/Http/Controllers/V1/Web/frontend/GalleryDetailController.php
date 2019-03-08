<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\GalleryDetail\GalleryDetailRepositoryInterface;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;

class GalleryDetailController extends Controller
{
    protected $repoGalleryDetail;
    protected $repoFacilitie;
    protected $repoCuisine;

    public function __construct(
        GalleryDetailRepositoryInterface $repoGalleryDetail,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine
    ) {
        $this->repoGalleryDetail = $repoGalleryDetail;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $galleryDetails = $this->repoGalleryDetail->index();
        $facilities = $this->repoFacilitie->index();
        $cuisines= $this->repoCuisine->index();

        return view('frontend.gallery-details.index', compact('galleryDetails', 'facilities', 'cuisines'));
    }
}
