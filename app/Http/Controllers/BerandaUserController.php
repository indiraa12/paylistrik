<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaUserController extends Controller
{
    public function index()
    {
        return view('/beranda.home');
    }
}
