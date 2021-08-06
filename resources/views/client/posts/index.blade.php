@extends('client.layouts.master')
@section('content')
<div class="main main-raised mt-100">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('client.posts.index') }}">Danh sách bài viết đã đăng</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>
    <div id="tables">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h4>
                    <small>Danh sách các bài viết</small>
                </h4>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        @if ($posts->isEmpty())
                            <td>Chưa có dữ liệu để hiển thị!</td>
                        @endif
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Slug (URL SEO)</th>
                                <th>Loại game</th>
                                <th>Hiển thị</th>
                                <th>Ngày cập nhật bài viết</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        @foreach ($posts as $idx => $post)
                            <tbody>
                                <tr>
                                    <td>{{ ++$idx }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ Arr::get($type, $post->type) }}</td>
                                    <td>{{ $post->getPublishText() }}</td>
                                    <td>{{ $post->getTimeUpdated() }}</td>
                                    <td>
                                        <form action="{{ route('client.posts.destroy', $post->id) }}" method="POST">   
                                            <a class="btn btn-primary" href="{{ route('client.posts.edit', $post->id) }}">Chỉnh sửa</a>   
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
</div>

<style type="text/css">
    .fw-bold h4 {
        font-weight: bold !important;
    }
</style>

@endsection