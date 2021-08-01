@extends('client.layouts.master')

@section('content')
<div class="main main-raised mt-100">
    <div class="section">
        <div class="projects-2" id="projects-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto text-center">
                            <h2 class="title">DANH SÁCH GAME 3Q!</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <a href="{{ route('client.games.tn3q_vng.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="{{ asset('images/client_game_tn3q_vng.jpg') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="#">
                                        <h4 class="card-title">THIẾU NIÊN 3Q VNG</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <a href="{{ route('client.games.tn3q_china.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="{{ asset('images/client_game_tn3q_china.jpg') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="#">
                                        <h4 class="card-title">THIẾU NIÊN 3Q TRUNG QUỐC</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <a href="{{ route('client.games.tan_omg_3q_vng.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="{{ asset('images/client_game_tan_omg_3q_vng.webp') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="#">
                                        <h4 class="card-title">TÂN OMG 3Q VNG</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card card-plain">
                                <a href="{{ route('client.games.tan_omg_3q_china.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="{{ asset('images/client_game_tan_omg_3q_china.jpg') }}">
                                    </div>
                                </a>
                                <div class="card-body ">
                                    <a href="#">
                                        <h4 class="card-title">TÂN OMG 3Q TRUNG QUỐC</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<style type="text/css">
    .custom-banner {
    }
</style>
@endsection