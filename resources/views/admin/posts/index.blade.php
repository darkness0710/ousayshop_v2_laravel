@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quản lí bài viết</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a class="btn btn-block btn-primary" href="{{ route('admin.posts.create') }}">Thêm mới</a>
                                </div>
                            </div>
                        </div>
                       @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiêu đề</th>
                                        <th>Slug (URL SEO)</th>
                                        <th>Loại game</th>
                                        <th>Tác giả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                @if ($posts->isEmpty())
                                    <td>Chưa có dữ liệu để hiển thị!</td>
                                @endif
                                @foreach ($posts as $post)
                                    <tbody>
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->name }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{{ Arr::get($type, $post->type) }}</td>
                                            <td>Admin</td>
                                            <td>
                                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">   
                                                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Chỉnh sửa</a>   
                                                    @csrf
                                                    @method('DELETE')      
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
