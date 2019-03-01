<?php

namespace App\Repositories\V1\Contact;

interface ContactRepositoryInterface
{
    public function search($key);
    public function changestatus($data);
}
