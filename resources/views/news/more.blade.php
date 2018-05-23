@extends('global')

@section('contents')

@include("components.breadcrumb")

<div class="Content section-spacing">
    <div class="Heading">
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

            <div class="section-spacing">
                @if ( $order === "view" )
                @include("components.article_list", ["articles" => $articles, "badge" => $offset])
                @else
                @include("components.article_list", ["articles" => $articles])
                @endif
            </div>

            @include("components.pagination", ["pager" => $articles])
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

@endsection
