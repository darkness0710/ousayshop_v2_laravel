@extends('client.layouts.master')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.14/dist/css/splide.min.css">
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<div class="section section-gray mt-100">
    <div class="container">
        <div class="main main-raised main-product">
            <div class="row">
                <div class="col-12">
                    <div class="container">
                            <div class="splide" id="splide">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                         @foreach ($shop->getObjectImages() as $entity)
                                            <li class="splide__slide">
                                                <img src="{{ $entity->src }}">
                                            </li>
                                         @endforeach
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="container row">
                <div class="col-12">
                    <h2 class="title">{{ $shop->name }}</h2>
                    <h3 class="main-price">{{ $shop->getPriceAndSaleMessage() }}</h3>
                    <div id="accordion" role="tablist">
                        <div class="card card-collapse">
                            <div role="tab" id="headingOne" class="card-header">
                                <h5 class="mb-0"><a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Mô tả <i class="material-icons">keyboard_arrow_down</i></a></h5>
                            </div>
                            <div id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" class="collapse show">
                                <div class="card-body">
                                    <p>{{ $shop->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @if (isUserLogin())
                        <div class="row pull-right"><button class="btn btn-rose btn-round">Đặt mua &nbsp;<i class="material-icons">shopping_cart</i></button></div>
                    @else --}}
                        <div class="row pull-right">
                                <a href="https://m.me/105193195108584" class="btn btn-rose btn-round" target="_blank">Liên hệ mua qua Fanpage &nbsp;<i class="material-icons">shopping_cart</i></a>
                            </button>
                        </div>
                        <br>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    new Splide( '#splide' ).mount();
</script>

<style type="text/css">
    img {
        width: 100%;
        height:100%;
    }
</style>

@endsection