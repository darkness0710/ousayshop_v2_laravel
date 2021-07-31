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
                                <a href="{{ route('client.games.tn3q_vn.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="https://scontent-sin6-3.xx.fbcdn.net/v/t1.6435-9/186264964_278470204026463_9023401460158818067_n.jpg?_nc_cat=110&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=qdnpXyiZrYMAX9X2cyv&tn=pxyiGESX3dFsq9Rx&_nc_ht=scontent-sin6-3.xx&oh=ca615d1c307e24c50ad362e71020989f&oe=612AFE41">
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
                                        <img src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.6435-9/103695794_117887873285995_2999775042220947818_n.jpg?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=0v2KvT3xAusAX_Ue3Nl&_nc_ht=scontent-sin6-1.xx&oh=cd6f04fd28fa67bb4b0711f70ffaa35d&oe=612AEAE9">
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
                                <a href="{{ route('client.games.tan_omg_3q_china.index') }}">
                                    <div class="card-header card-header-image custom-banner">
                                        <img src="https://gamek.mediacdn.vn/133514250583805952/2021/3/26/1621954611452048941684858485915712025524945o-16167568882801599917319.jpg">
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
                                        <img src="http://image.9game.cn/s/9game/g/2020/8/19/170242574.jpg">
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