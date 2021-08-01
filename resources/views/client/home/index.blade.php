@extends('client.layouts.master')

@section('content')
<div class="main main-raised mt-100">
    <div class="section">
        <div class="projects-2" id="projects-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h2 class="title">OusayGaming</h2>
                            @if (isUserLogin())
                                <h5 class="description">Chào mừng {{ getCurrentUser()->name }} đến với OusayGaming, hãy lựa chọn các chức năng của website!</h5>
                            @else
                                <h5 class="description">Chào mừng bạn đến với OusayGaming, hãy lựa chọn các chức năng của website!</h5>
                            @endif
                            <div class="section-space"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-plain">
                                <a href="{{ route('client.shops.index') }}">
                                    <div class="card-header card-header-image">
                                        <img src="{{ asset('images/client_home_shop.jpg') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="{{ route('client.shops.index') }}">
                                        <h4 class="card-title">Shop Account 3Q</h4>
                                    </a>
                                    <p class="card-description">
                                        Nơi giao bán, các loại acc game 3Q!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-plain">
                                <a href="{{ route('client.games.index') }}">
                                    <div class="card-header card-header-image">
                                        <img src="{{ asset('images/client_home_game.jpg') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="{{ route('client.games.index') }}">
                                        <h4 class="card-title">Hướng dẫn game</h4>
                                    </a>
                                    <p class="card-description">
                                        Nơi thảo luận, hướng dẫn chơi các loại game 3Q!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>               
    </div>
</div>
@endsection