@extends('admin.layouts.master')

@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Quản lí bài viết</a></li>
                            <li class="breadcrumb-item active">Màn thêm mới</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Thêm mới bài viết</h3>
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
                    <div class="card-body">
                        <form class="form-horizontal" method="post" id="form_shop" action="{{ route('admin.posts.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tiêu đề bài viết (*)</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Hướng dẫn leo map ma thần" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Đường dẫn SEO bài viết (*)</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="huong-dan-leo-map-ma-than" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại game(*)</label>
                                        <select class="form-control" name="type">
                                            <option value="0">Thiếu niên 3Q VNG</option>
                                            <option value="1">Thiếu niên 3Q YOYO</option>
                                            <option value="2">Thiếu niên 3Q 9G</option>
                                            <option value="3">Tân OMG 3Q VNG</option>
                                            <option value="4">Tân OMG 3Q China</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Nội dung(*)</label>
                                    <textarea name="content">{{ old('content') }}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace('content', {
                                            filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token() ]) }}",
                                            filebrowserUploadMethod: 'form',
                                            height: 1000
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo bài viết</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection