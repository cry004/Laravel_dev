@extends("global")

@section("contents")

@include("components.breadcrumb")

<div class="Content">

    <div class="Grid Grid2-1 section-spacing">
        <div class="Grid-Content">
            <div class="Heading section-spacing Heading-NoBorder Heading-NoMargin">
                <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
            </div>

            <div class="PagerInfo align-right">
                <p>{{ $photographs->total() }} 件中 / {{ $photographs->start() }}-{{ $photographs->end() }}件</p>
            </div>

            <ul class="Tab section-spacing"><!--
                @if ( $order !== "view" )
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/?order=view') }}" class="align-center">ランキング</a></li><!--
                @else
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/?order=view') }}" class="align-center">ランキング</a></li><!--
                @endif
            --></ul>

            <div class="Grid Grid3 section-spacing">
            @foreach ( $photographs as $index => $photograph )
                @if ( $order === "view" )
                    @include("components.card", ["photo" => $photograph, "index" => $index + $offset + 1])
                @else
                    @include("components.card", ["photo" => $photograph, "index" => null])
                @endif
            @endforeach
            </div>

            @include("components.pagination", ["pager" => $photographs])
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

@endsection
