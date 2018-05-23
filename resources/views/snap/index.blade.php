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
    <ul class="Tab Tab-Item3 section-spacing"><!--
        @if ( $order === "view" )
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap') }}" class="align-center">新着</a></li><!--
        --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('snap?order=view') }}" class="align-center">ランキング</a></li><!--
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap?order=pickup') }}" class="align-center">ピックアップ</a></li><!--
        @elseif ( $order === "pickup" )
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap') }}" class="align-center">新着</a></li><!--
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap?order=view') }}" class="align-center">ランキング</a></li><!--
        --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('snap?order=pickup') }}" class="align-center">ピックアップ</a></li><!--
        @else
        --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('snap') }}" class="align-center">新着</a></li><!--
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap?order=view') }}" class="align-center">ランキング</a></li><!--
        --><li class="Tab-Item"><a href="{{ AppUrl::to('snap?order=pickup') }}" class="align-center">ピックアップ</a></li><!--
        @endif
    --></ul>

    <div class="Heading section-spacing Heading-NoMargin Heading-NoBorder">
        @if ( $order === "view" )
        <h2 class="Heading-Text">ヘアスナップランキング</h2>
        @elseif ( $order === "pickup" )
        <h2 class="Heading-Text">今週のピックアップヘアスナップ #{{ $pickupKeyword->text_content }}</h2>
        @else
        <h2 class="Heading-Text">新着ヘアスナップ</h2>
        @endif
    </div>
    <div class="Grid Grid4">
        @foreach ( $snaps as $index => $snap )
            @if ( $order === "view" )
            @include("components.card", ["photo" => $snap, "index" => $index + 1])
            @else
            @include("components.card", ["photo" => $snap, "index" => null])
            @endif
        @endforeach
    </div>

    <div class="Grid Grid2-1 section-spacing">
        <div class="Grid-Content">
            <div class="Heading">
                <h3 class="Heading-Text">レングス別でヘアスナップを探す</h3>
            </div>
            <div class="Grid Grid3 R-TopBorder section-spacing">
                @foreach ( $lengths as $length )
                <div class="ImageText">
                    <a href="{{ AppUrl::to('tag/' . $length->keyword_id . '/snap') }}">
                        <figure class="ImageText-Content">
                            <img src="{{ $length->image_url }}" class="ImageText-Image round-image" alt="{{ $length->name }}" width="56">
                            <figcaption class="ImageText-Text">{{ $length->name }}</figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="Heading">
                <h3 class="Heading-Text">テイスト別でヘアスナップを探す</h3>
            </div>

            <div class="Grid Grid3 R-TopBorder section-spacing">
                @foreach ( $tastes as $taste )
                <div class="ImageText">
                    <a href="{{ AppUrl::to('tag/' . $taste->keyword_id . '/snap') }}">
                        <figure class="ImageText-Content">
                            <img src="{{ $taste->image_url }}" class="ImageText-Image round-image" alt="{{ $taste->name }}" width="56">
                            <figcaption class="ImageText-Text">{{ $taste->name }}</figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>

            @include("components.popular_keywords")

            <div class="Heading">
                <h3 class="Heading-Text Heading-Text-Small">シーン別でヘアスナップを探す</h3>
            </div>
            <div class="Grid Grid3 R-Grid-Cut6">
                @foreach ( $scenes as $scene )
                <div class="ImageOverlay">
                    <a href="{{ AppUrl::to('tag/' . $scene->keyword_id . '/snap') }}">
                        <figure>
                            @if ( $scene->filePath )
                            <img src="{{ $scene->filePath }}" alt="{{ $scene->text_content }}" class="image-max">
                            @else
                            <img src="{{ AppUrl::asset('images/no-image.jpg') }}" alt="{{ $scene->text_content }}" class="image-max">
                            @endif
                            <figcaption class="ImageOverlay-Text">{{ $scene->text_content }}</figcaption>
                        </figure>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="Grid-Content">
            @include("banners.app")
            @include("components.ranking_articles")
            @include("components.recent_articles")
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>
</div>

<hr class="section-border" />

@endsection
