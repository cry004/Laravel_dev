@extends("global")

@section("contents")

@include("components.breadcrumb")

<div class="Content">
    <div class="Heading">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>

    <div class="Grid Grid2-1 section-spacing">
        <div class="Grid-Content">

            <div class="PagerInfo align-right">
                <p>{{ $stylists->total() }} 件中 / {{ $stylists->start() }}-{{ $stylists->end() }}件</p>
            </div>

            <ul class="Tab section-spacing"><!--
                @if ( $order !== "view" )
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/?order=view') }}" class="align-center">ランキング</a></li><!--
                @else
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/') }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/?order=view') }}" class="align-center">ランキング</a></li><!--
                @endif
            --></ul>

            <div class="Grid Grid3 section-spacing">
                @foreach ( $stylists as $index => $stylist )
                    @if ( $order === "view" )
                    @include("components.card_stylist", ["stylist" => $stylist, "index" => $index + $offset + 1])
                    @else
                    @include("components.card_stylist", ["stylist" => $stylist, "index" => null])
                    @endif
                @endforeach
            </div>

            @include("components.pagination", ["pager" => $stylists])

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

<hr class="section-border" />

@endsection
