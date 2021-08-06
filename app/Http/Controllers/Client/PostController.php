<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', getCurrentUser()->id)->get();
        $type = $this->_getTypeConfig();
        return view('client.posts.index', compact('posts', 'type'));
    }

    public function create()
    {
        $type = $this->_getTypeConfig();
        return view('client.posts.create', compact('type'));
    }

    public function edit($id)
    {
        $type = $this->_getTypeConfig();
        $post = Post::where('id', $id)->where('user_id', getCurrentUser()->id)->first();

        return view('client.posts.edit', compact('post', 'type'));
    }

    public function store(Request $request)
    {
        $data = $this->_getValidateCreateUpdate();
        $request->validate($data['rules'], $data['messages']);

        $params = $request->all();

        $params['is_publish'] = 0;
        Post::create($params);

        return redirect()->route('client.posts.index')
            ->with('success', 'Tạo bài viết mới thành công!');
    }

    public function update(Request $request, $id)
    {
        $data = $this->_getValidateCreateUpdate();
        $data['rules']['slug'] = [
            'required',
            Rule::unique('posts')->ignore($id),
        ];
        $validator = Validator::make($request->all(), $data['rules'], $data['messages']);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $params = $request->all();
        $params['is_publish'] = 0;
        Post::find($id)->update($params);
     
        return redirect()->route('client.posts.index')
            ->with('success', 'Cập nhật bài viết mới thành công!');
    }

    protected function _getValidateCreateUpdate()
    {
        request()->merge(['user_id' => getCurrentUser()->id]);
        $rules = [
            'slug' => ['required', 'unique:posts'],
            'type' => ['required'],
            'content' => ['required'],
            'name' => ['required'],
        ];

        $customMessages = [
            'slug.required' => 'Chưa nhập đường dẫn SEO bài viết ',
            'slug.unique' => 'Đường dẫn SEO bài viết  đã trùng lặp!',
            'type.required' => 'Chưa lựa chọn hướng dẫn game!',
            'content.required' => 'Chưa nhập nội dung bài viết!',
            'name.required' => 'Chưa nhập tiêu đề bài viết'
        ];

        return ['rules' => $rules, 'messages' => $customMessages];
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
