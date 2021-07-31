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

    public function tn3qVngIndex()
    {
        $posts = Post::whereIn('type', ['0'])->get();
        return view('client.games.tn3q_vng.index', compact('posts'));
    }

    public function tn3qVngShow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('client.games.show_post', compact('post'));
    }

    public function tanOmg3qChinaIndex()
    {
        $posts = Post::whereIn('type', ['4'])->get();
        return view('client.games.new_omg_3q_china.index', compact('posts'));
    }

    public function tanOmg3qChinaShow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('client.games.show_post', compact('post'));
    }

    public function tanOmg3qVngIndex()
    {
        $posts = Post::whereIn('type', ['3'])->get();
        return view('client.games.new_omg_3q_vng.index', compact('posts'));
    }

    public function tanOmg3qVngShow($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('client.games.show_post', compact('post'));
    }
}
