<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('client.home.index');
    }

    public function introduction()
    {
        return view('client.home.introduction');
    }
}
