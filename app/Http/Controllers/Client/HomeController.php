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
        $url = "https://wescan.vn/api/v1/donator_ranks?user_id=d91652d4fa8545369da73c1c3516864e&sort_by=base_price&sort_type=desc&limit=10&from_date=2020%2F08%2F01&to_date=2023%2F08%2F07";
        $reponse = file_get_contents($url);
        $wescanData = \Arr::get(json_decode($reponse, true), 'data.items')[0]['ranks'] ?? [];

        return view('client.home.index', compact('wescanData'));
    }

    public function introduction()
    {
        return view('client.home.introduction');
    }
}
