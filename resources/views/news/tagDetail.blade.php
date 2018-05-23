@extends('global')

@section('contents')

@include("components.breadcrumb")

<div class="Content section-spacing">
    <div class="Heading">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>
    <div class="Grid Grid2-1">
        <div class="Grid-Content">
            <div class="PagerInfo align-right">
                <p>{{ $articles->total() }} 件中 / {{ $articles->start() }}-{{ $articles->end() }}件</p>
            </div>

            <div class="Heading">
                <h2 class="Heading-Text Heading-Text-Small">カテゴリー</h2>
            </div>

            <div class="Grid Grid3 section-spacing R-Hidden">
                @include("components.category")
            </div>

            @include("components.popular_keywords")

            <ul class="Tab section-spacing"><!--
                @if ( $order !== "view" )
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/news') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/news/?order=view') }}" class="align-center">ランキング</a></li><!--
                @else
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/news') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/news/?order=view') }}" class="align-center">ランキング</a></li><!--
                @endif
            --></ul>

            <div class="section-spacing">
                @if ( $order === "view" )
                @include("components.article_list", ["articles" => $articles, "badge" => $offset])
                @else
                @include("components.article_list", ["articles" => $articles, "badge" => null])
                @endif
            </div>

            @include("components.pagination", ["pager" => $articles])
        </div>
        <div class="Grid-Content">
            @include("banners.app")
            @include("components.owner_pickup_articles")
            @include("components.ranking_articles")
            @include("components.recent_articles")
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>
</div>

@endsection
