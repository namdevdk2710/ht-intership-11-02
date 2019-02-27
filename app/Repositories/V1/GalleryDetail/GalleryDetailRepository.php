<?php

namespace App\Repositories\V1\GalleryDetail;

use App\Repositories\BaseRepository;
use App\Models\GalleryDetail;

class GalleryDetailRepository extends BaseRepository implements GalleryDetailRepositoryInterface
{
    public function getModel()
    {
        return GalleryDetail::class;
    }
}
