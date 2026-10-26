<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function index()
    {
        return view('Guest.home');
    }

    public function home()
    {
        return view('Guest.home');
    }
}

