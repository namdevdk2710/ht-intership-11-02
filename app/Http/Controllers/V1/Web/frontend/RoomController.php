<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        return view('frontend.homes.index');
    }

    public function bookroom()
    {
        return view('frontend.book-rooms.index');
    }
}
