@extends('client.layouts.master')

@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <div class="main main-raised mt-100">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('client.posts.index') }}">Danh sách bài viết đã đăng</a></li>
               <li class="breadcrumb-item active" aria-current="page">Cập nhật bài viết</li>
            </ol>
        </nav>

        <div class="container">
            <div class="section">
                <h3 class="title text-center">Cập nhật bài viết</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div id="inputs">
                <form class="form-horizontal" method="post" id="form_shop" action="{{ route('client.posts.update', $post->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="title fw-bold">
                        <h4>Tiêu đề bài viết (*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control" placeholder="Hướng dẫn vượt ải thời không" name="name" value="{{ old('name', $post->name) }}">
                            </div>
                        </div>
                    </div>
                    <div class="title fw-bold">
                        <h4>Đường dẫn SEO bài viết (*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control" placeholder="huong-dan-vuot-ai-thoi-khong" name="slug" value="{{ old('slug', $post->slug) }}">
                            </div>
                        </div>
                    </div>
                    <div class="title fw-bold">
                        <h4>Hướng dẫn game(*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="btn-group bootstrap-select">
                                <select name="type" class="selectpicker" data-style="select-with-transition" title="Lựa chọn loại game" data-size="7" tabindex="-98">
                                    @foreach ($type as $key => $value)
                                        @php 
                                            $checked = old('type', $post->type) == $key ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $key }}" {{ $checked }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="title fw-bold">
                        <h4>Nội dung bài viết(*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group label-floating bmd-form-group">
                                <textarea class="form-control" rows="5" name="content">{{ old('content', $post->content) }}</textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('content', {
                                        filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token() ]) }}",
                                        filebrowserUploadMethod: 'form',
                                        height: 800
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="section text-center">
                        <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style type="text/css">
        .fw-bold h4 {
            font-weight: bold !important;
        }
    </style>
@endsection