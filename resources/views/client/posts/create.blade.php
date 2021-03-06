@extends('client.layouts.master')

@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <div class="main main-raised mt-100">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('client.posts.index') }}">Danh sách bài viết đã đăng</a></li>
               <li class="breadcrumb-item active" aria-current="page">Đăng bài viết</li>
            </ol>
        </nav>

        <div class="container">
            <div class="section">
                <h3 class="title text-center">Đăng bài viết mới</h3>
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
                <form class="form-horizontal" method="post" id="form_shop" action="{{ route('client.posts.store') }}">
                    @csrf
                    <div class="title fw-bold">
                        <h4>Tiêu đề bài viết (*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control" placeholder="Hướng dẫn vượt ải thời không" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="title fw-bold">
                        <h4>Đường dẫn SEO bài viết (*)</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-default bmd-form-group">
                                <input type="text" class="form-control" placeholder="huong-dan-vuot-ai-thoi-khong" name="slug" value="{{ old('slug') }}">
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
                                    <option value="0">Thiếu niên 3Q VNG</option>
                                    <option value="1">Thiếu niên 3Q YOYO</option>
                                    <option value="2">Thiếu niên 3Q 9G</option>
                                    <option value="3">Tân OMG 3Q VNG</option>
                                    <option value="4">Tân OMG 3Q China</option>
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
                                <textarea class="form-control" rows="5" name="content">{{ old('content') }}</textarea>
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
                        <button type="submit" class="btn btn-primary">Tạo bài viết</button>
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