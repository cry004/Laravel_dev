@extends('global')

@section('extra_javascripts')
<script src="{{ AppUrl::asset('js/min/carousel.js') }}"></script>
@endsection

@section('contents')

@include("components.breadcrumb")
@include("components.carousel", ["carousels" => $carousels])

<div class="Content section-spacing">
    <div class="Heading Heading-NoMargin">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>
    <div class="Grid Grid2-1">
        <div class="Grid-Content">
            <div class="Heading R-Hidden">
                <h2 class="Heading-Text Heading-Text-Small">カテゴリー</h2>
            </div>
            <div class="Grid Grid3 section-spacing R-Hidden">
                @include("components.category")
            </div>

            <div class="PagerInfo align-right">
                <p>{{ $articles->total() }} 件中 / {{ $articles->start() }}-{{ $articles->end() }}件</p>
            </div>

            <ul class="Tab section-spacing"><!--
                @if ( $order !== "view" )
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('news') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('news/?order=view') }}" class="align-center">ランキング</a></li><!--
                @else
                --><li class="Tab-Item"><a href="{{ AppUrl::to('news') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('news/?order=view') }}" class="align-center">ランキング</a></li><!--
                @endif
            --></ul>

            <div class="section-spacing">
            @if ( $order === "view" )
                @include("components.article_list", ["articles" => $articles, "badge" => $offset])
                @if ( $articles->total() > 10 )
                <div class="More More-OffsetH">
                    <a href="{{ AppUrl::to('news/ranking') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</i></a>
                </div>
                @endif
            @else
                @include("components.article_list", ["articles" => $articles])
                @if ( $articles->total() > 10 )
                <div class="More More-OffsetH">
                    <a href="{{ AppUrl::to('news/recent') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</i></a>
                </div>
                @endif
            @endif
            </div>
        </div>
        <div class="Grid-Content">
            @include("banners.app")
            @include("components.popular_keywords")
            @include("components.owner_pickup_articles")
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>
</div>

<hr class="section-border" />

@endsection
