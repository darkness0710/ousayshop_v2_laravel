<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Validator;

class PostController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $posts = Post::whereNull('user_id')->get();
        $type = $this->_getTypeConfig();
        return view('admin.posts.index', compact('posts', 'type'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        $type = $this->_getTypeConfig();
        $post = Post::find($id);

        return view('admin.posts.edit', compact('post', 'type'));
    }

    public function store(Request $request)
    {
        $data = $this->_getValidateCreateUpdate();
        $request->validate($data['rules'], $data['messages']);

        $params = $request->all();

        if (!isset($params['is_publish'])) {
            $params['is_publish'] = 0;
        }
        if ($params['is_publish'] == 'true') {
            $params['is_publish'] = 1;
        }
        Post::create($params);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Tạo bài viết mới thành công!');
    }

    public function update(Request $request, $id)
    {
        $data = $this->_getValidateCreateUpdate();
        $data['rules']['slug'] = 'required|unique:posts' . ',id,' . $id;
        $validator = Validator::make($request->all(), $data['rules'], $data['messages']);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $params = $request->all();
        if (!isset($params['is_publish'])) {
            $params['is_publish'] = 0;
        }
        if ($params['is_publish'] == 'true') {
            $params['is_publish'] = 1;
        }
        Post::find($id)->update($params);
     
        return redirect()->route('admin.posts.index')
            ->with('success', 'Cập nhật bài viết mới thành công!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Xóa bài viết thành công!');
    }

    protected function _getValidateCreateUpdate()
    {
        $rules = [
            'slug' => 'required|unique:posts',
            'type' => 'required',
            'content' => 'required',
            'name' => 'required',
        ];

        $customMessages = [
            'slug.required' => 'Chưa nhập url SEO cho bài viết!',
            'slug.unique' => 'Url bài viết đã trùng lặp!',
            'type.required' => 'Chưa lựa chọn loại bài viết!',
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
