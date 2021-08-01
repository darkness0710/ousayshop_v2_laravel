@extends('client.layouts.master')

@section('content')
<div class="main main-raised mt-60">
    <div class="section">
        <div class="container">
            <div class="about-office">
                <div class="row">
                    <div class="col-md-12">
                        <img alt="Raised Image" src="https://pic.youzu.com/hd/sg2/online/dist/pc/images/news-bg.jpg" class="img-raised rounded img-fluid">
                    </div>
                </div>
            </div>
            @if ($shops->isNotEmpty())
                <h2 class="section-title">Danh sách các loại tài khoản</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-refine card-plain card-rose">
                            <div class="card-body">
                                <div id="accordion" role="tablist">
                                    <div class="card card-collapse">
                                        <div role="tab" id="headingThree" class="card-header">
                                            <h5 class="mb-0"><a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="" class="collapsed"> Tài khoản thiếu niên 3Q <i class="material-icons">keyboard_arrow_down</i></a></h5>
                                        </div>
                                        <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="collapse show">
                                            <div class="card-body">
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="0"> TN3Q-9G <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="1"> TN3Q-YOYO <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-collapse">
                                        <div role="tab" id="headingThree" class="card-header">
                                            <h5 class="mb-0"><a data-toggle="collapse" href="#" aria-expanded="false" aria-controls="" class="collapsed"> Tài khoản tân OMG 3Q (VNG) <i class="material-icons">keyboard_arrow_down</i></a></h5>
                                        </div>
                                        <div id="collapseThree" role="tabpanel" aria-labelledby="headingThree" class="collapse show">
                                            <div class="card-body">
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="2"> Tân-OMG-3Q-Quần <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="3"> Tân-OMG-3Q-Ngụy <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="4"> Tân-OMG-3Q-Ngô <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                                <div>
                                                    <div class="form-check"><label class="form-check-label"><input type="checkbox" checked="checked" class="form-check-input" value="5"> Tân-OMG-3Q-Thục <span class="form-check-sign"><span class="check"></span></span></label></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($shops as $shop)
                                <div class="col-md-4">
                                    <div data-colored-shadow="false" class="card card-product card-plain no-shadow">
                                        <div class="card-header card-header-image">
                                            <a href="{{ route('client.shops.show', $shop->id) }}">
                                                <div>
                                                    <img src="{{ $shop->getDefaulThumbnailUrl() }}" alt="{{ $shop->name }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{ route('client.shops.show', $shop->id) }}">
                                                <h4 class="card-title">{{ $shop->name }}</h4>
                                            </a>
                                        </div>
                                        <div class="text-center">
                                            @php
                                                $isSell = $shop->is_sell == 1 ? '' : 'stocking';
                                            @endphp
                                            <div class="price-container"><span class="price {{ $isSell }}">{{ $shop->getPriceAndSaleMessage() }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <h2 class="section-title text-center text-danger">Hiện tại chưa có tài khoản nào rao bán!</h2>
            @endif
        </div>
    </div>
</div>

<style type="text/css">
    .stocking {
        color: #00f!important;
    }
</style>
@endsection