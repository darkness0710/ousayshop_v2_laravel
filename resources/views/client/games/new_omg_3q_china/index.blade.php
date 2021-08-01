@extends('client.layouts.master')

@section('content')
    <div class="main main-raised mt-100">
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{ route('client.games.index') }}">Hướng dẫn chơi game</a></li>
               <li class="breadcrumb-item active" aria-current="page">Tổng hợp bài viết hướng dẫn game Tân OMG 3Q Trung Quốc</li>
            </ol>
        </nav>
        <div class="container">
            <div class="section">
                <h3 class="title text-center">Tổng hợp bài viết hướng dẫn game Tân OMG 3Q Trung Quốc</h3>
                <br>
                @if ($posts->isEmpty())
                    <h1 class="title text-center text-warning">Hiện tại chưa có bài viết nào!</h1>
                @endif
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card card-plain card-blog">
                                <div class="card-header card-header-image">
                                    <a href="{{ route('client.games.tan_omg_3q_china.show', $post->slug) }}">
                                        <img class="img img-raised" src="{{ asset('images/client_game_tan_omg_3q_china.jpg') }}">
                                    </a>
                                <div class="colored-shadow" style=""></div></div>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('client.games.tan_omg_3q_china.show', $post->slug) }}">{{ $post->name }}</a>
                                    </h4>
                                    <p class="card-description">
                                        <a href="{{ route('client.games.tan_omg_3q_china.show', $post->slug) }}"> Đọc thêm... </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection