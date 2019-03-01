<?php

namespace App\Repositories\V1\Contact;

use App\Repositories\BaseRepository;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function getModel()
    {
        return Contact::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $contacts = Contact::where('fullname', 'LIKE', '%' . $key . '%')->paginate(5);
        $contacts->appends(['key' => $key]);

        return $contacts;
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $contact = $this->model->find($id);

        if ($contact->status == 0) {
            $contact->status = 1;
        } else {
            $contact->status = $contact->status;
        }

        $contact->save();

        return response()->json($contact);
    }
}
