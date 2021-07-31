<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopAccount;

class ShopAccountController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $shops = ShopAccount::all();
        return view('client.shops.index', compact('shops'));
    }

    public function show($id)
    {
        $shop = ShopAccount::find($id);
        return view('client.shops.show', compact('shop'));
    }
}
