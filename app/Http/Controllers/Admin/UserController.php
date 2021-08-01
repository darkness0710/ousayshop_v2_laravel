<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function post()
    {
        $posts = Post::whereNotNull('user_id')->get();
        return view('admin.users.post', compact('posts'));
    }
}
