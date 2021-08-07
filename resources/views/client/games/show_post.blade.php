@extends('client.layouts.master')

@section('content')
    <div class="section">
        <div class="projects-2" id="projects-2">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ route('client.games.index') }}">Hướng dẫn chơi game</a></li>
                   <li class="breadcrumb-item"><a href="{{ getRouteParentCategory($post->type) }}">{{ getParentCategory($post->type) }}</a></li>
                   <li class="breadcrumb-item active" aria-current="page">{{ $post->name }}</li>
                </ol>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                        <h2 class="title">{{ $post->name }}</h2>
                    </div>
                </div>
                <div class="row">
                    {!! $post->content !!}
                </div>
                <div class="row">
                    <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fshopacc3q.com%2F&width=450&layout=standard&action=like&size=large&share=true&height=35&appId=1058991607967887" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    <div class="fb-comments" data-href="http://shopacc3q.com/" data-width="" data-numposts="100"></div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-right">
                        <h2 class="title">Tác giả: ADMIN</h2>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection