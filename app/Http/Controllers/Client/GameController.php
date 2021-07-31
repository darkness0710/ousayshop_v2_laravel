<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class GameController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('client.games.index');
    }

    public function tn3qChinaIndex()
    {
        $posts = Post::whereIn('type', ['1', '2'])->get();
        return view('client.games.tn3q_china.index', compact('posts'));
    }

    public function tn3qChinaShow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('client.games.show_post', compact('post'));
    }
}
