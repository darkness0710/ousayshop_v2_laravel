<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', getCurrentUser()->id)->get();
        return view('client.posts.index', compact('posts'));
    }

    public function create()
    {
        $type = $this->_getTypeConfig();
        return view('client.posts.create', compact('type'));
    }

    protected function _getTypeConfig()
    {
        return [
            "0" => "Thiếu niên 3Q VNG",
            "1" => "Thiếu niên 3Q YOYO",
            "2" => "Thiếu niên 3Q 9G",
            "3" => "Tân OMG 3Q VNG",
            "4" => "Tân OMG 3Q China",
        ];
    }
}
