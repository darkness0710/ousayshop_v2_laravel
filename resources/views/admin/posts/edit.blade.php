@extends('admin.layouts.master')

@section('content')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <div class="content-wrapper" style="min-height: 1342.88px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Quản lí bài viết</a></li>
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
                        <h3 class="card-title">Cập nhật bài viết</h3>
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
                        <form class="form-horizontal" method="post" id="form_shop" action="{{ route('admin.posts.update', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tiêu đề bài viết (*)</label>
                                        <input type="text" name="name" value="{{ old('name', $post->name) }}" class="form-control" placeholder="Hướng dẫn leo map ma thần" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Đường dẫn SEO bài viết (*)</label>
                                        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="form-control" placeholder="huong-dan-leo-map-ma-than" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Loại game(*)</label>
                                        <select class="form-control" name="type">
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

                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        @php
                                            $checked = $post->getIsPublish() ? 'checked' : '';
                                        @endphp
                                        <input name="is_publish" class="custom-control-input" type="checkbox" id="customCheckbox1" value="true" {{ $checked }}>
                                        <label for="customCheckbox1" class="custom-control-label">Hiển thị công khai</label>
                                    </div>
                                  </div>
                                </div> 
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Nội dung(*)</label>
                                    <textarea name="content">{{ old('content', $post->content) }}</textarea>
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
                                <button type="submit" class="btn btn-primary">Cập nhật bài viết</button>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection