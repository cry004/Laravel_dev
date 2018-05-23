@extends("global")

@section('extra_javascripts')
<script src="{{ AppUrl::asset('js/min/carousel.js') }}"></script>
@endsection

@section("contents")

@include("components.breadcrumb")
@include("components.carousel_snap", ["carousels" => $carousels])

<div class="Content">
    <div class="Heading section-spacing R-Hidden">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>

    <ul class="Tab section-spacing"><!--
        @if ( $order === "view" )
        --><li class="Tab-Item"><a href="{{ AppUrl::to('stylist') }}" class="align-center">新着</a></li><!--
        --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('stylist/?order=view') }}" class="align-center">ランキング</a></li><!--
        @else
        --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('stylist') }}" class="align-center">新着</a></li><!--
        --><li class="Tab-Item"><a href="{{ AppUrl::to('stylist/?order=view') }}" class="align-center">ランキング</a></li><!--
        @endif
    --></ul>

    <div class="Heading section-spacing Heading-NoMargin Heading-NoBorder">
        @if ( $order === "view" )
        <h2 class="Heading-Text Heading-Text-Small">人気スタイリストランキング</h2>
        @else
        <h2 class="Heading-Text Heading-Text-Small">新着スタイリスト</h2>
        @endif
    </div>
    <div class="Grid Grid4">
        @foreach ( $stylists as $index => $stylist )
            @if ( $order === "view" )
            @include("components.card_stylist", ["stylist" => $stylist, "index" => $index + 1])
            @else
            @include("components.card_stylist", ["stylist" => $stylist, "index" => null])
            @endif
        @endforeach
    </div>

    <div class="Grid Grid2-1 section-spacing">
        <div class="Grid-Content">
            @include("components.popular_keywords")

            @foreach ( $lengths as $length )
                @if ( count($length->stylists) > 0 )
                <div class="Heading">
                    <h3 class="Heading-Text Heading-Text-Small">{{ $length->name }}が得意なスタイリスト</h3>
                </div>
                <div class="Grid Grid3">
                @foreach ( $length->stylists as $index => $stylist )
                @include("components.card_stylist", ["stylist" => $stylist, "index" => $index + 1])
                @endforeach
                </div>
                <div class="More R-TopBorder">
                    <a href="{{ AppUrl::to('tag/' . $length->keyword_id . '/stylist') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
                </div>
                @endif
            @endforeach
        </div>
        <div class="Grid-Content">
            @include("banners.app")
            @include("components.owner_pickup_articles")
            {{--@include("components.ranking_articles")--}}
            @include("components.recent_articles")
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>
</div>
<hr class="section-border section-spacing" />

@endsection
