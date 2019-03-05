<?php

namespace App\Repositories\V1\Offer;

use App\Repositories\BaseRepository;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;

class OfferRepository extends BaseRepository implements OfferRepositoryInterface
{
    public function getModel()
    {
        return Offer::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function store($data)
    {
        $file = $data['image'];
        $forder = 'uploads/images/Offers';
        $extensionFile = $file -> getClientOriginalExtension();
        $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
        $file->move($forder, $fileName);

        $data['image'] = $fileName;

        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $offer = $this->model->find($id);

        if (!empty($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/offers/' . $offer->image;
            if (file_exists(public_path($nameImageOld))) {
                unlink(public_path($nameImageOld));
            }
            $forder = ('uploads/images/offers');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['name']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $offer->image;
        }

        return $offer->update($data);
    }

    public function search($key)
    {
        $offers = Offer::where('name', 'LIKE', '%' . $key . '%')->paginate(5);
        $offers->appends(['key' => $key]);

        return $offers;
    }

    public function delete($id)
    {
        $offer = $this->model->find($id);
        $nameImageOld = 'uploads/images/offers/' . $offer->image;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }
        $offer->delete();
    }

    public function indexTop($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->take($limit)->get($columns);
    }

    public function detail($id)
    {
        return $offer = $this->model->find($id);
    }
}
