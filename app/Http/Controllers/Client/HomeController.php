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
        // wescan
        $url = "https://wescan.vn/api/v1/donator_ranks?user_id=d91652d4fa8545369da73c1c3516864e&sort_by=base_price&sort_type=desc&limit=10&from_date=2020%2F08%2F01&to_date=2023%2F08%2F07";
        $reponse = file_get_contents($url);
        $wescanData = \Arr::get(json_decode($reponse, true), 'data.items')[0]['ranks'] ?? [];

        // player duo
        $url = "https://playerduo.com/api/playerDuo-service-v2/player/5e591384ea923251b3a1e602/top-donate?lang=vi&deviceType=browser";
        $reponse = file_get_contents($url);
        $playDuoData = \Arr::get(json_decode($reponse, true), 'result') ?? [];

        return view('client.home.index', compact('wescanData', 'playDuoData'));
    }

    public function introduction()
    {
        return view('client.home.introduction');
    }
}
