<?php

namespace App\Repositories\V1\Offer;

interface OfferRepositoryInterface
{
    public function search($key);

    public function indexTop($limit = null, $columns = ['*']);
}
