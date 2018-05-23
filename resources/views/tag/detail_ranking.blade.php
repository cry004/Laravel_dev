@extends("global")

@section("contents")
@include("components.breadcrumb")

<div class="Content">
    <div class="Heading section-spacing Heading-NoMargin Heading-NoBorder">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>

    <div class="Grid Grid2-1 section-spacing">
        <div class="Grid-Content">
            <ul class="Tab section-spacing"><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id) }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id . '/?order=view') }}" class="align-center">ランキング</a></li><!--
            --></ul>

            @if ( count($articles) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関する記事ランキング</h2>
            </div>

            @include("components.article_list", ["articles" => $articles, "badge" => 0])
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/news/?order=view') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
            </div>
            @endif

            @if ( count($snaps) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関するヘアスナップランキング</h2>
            </div>

            <div class="Grid Grid3 section-spacing">
                @foreach ( $snaps as $index => $snap )
                @include("components.card", ["photo" => $snap, "index" => $index + 1])
                @endforeach
            </div>
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/?order=view') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
            </div>
            @endif

            @if ( count($stylists) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関するスタイリストランキング</h2>
            </div>

            <div class="Grid Grid2 section-spacing">
                @foreach ( $stylists as $index => $stylist )
                <div class="Stylist">
                    <a href="{{ $stylist->getProfileURL() }}">
                        <img src="{{ $stylist->getIconImage() }}" width="64" alt="{{ $stylist->nickname }}" class="round-image">
                        <div class="Stylist-Profile">
                            <h3 class="Stylist-Name text-ellipsis">{{ $stylist->nickname }} | {{ $stylist->shop_name }}</h3>
                            <span>{{ $stylist->getTypeString() }}</span>
                            <span>{{ $stylist->areaname }}</span>
                        </div>
                    </a>
                    @if ( $index === 0 )
                    <span class="Stylist-Badge Stylist-Badge-Gold">{{ $index + 1 }}</span>
                    @elseif ( $index === 1 )
                    <span class="Stylist-Badge Stylist-Badge-Silver">{{ $index + 1 }}</span>
                    @elseif ( $index === 2 )
                    <span class="Stylist-Badge Stylist-Badge-Bronze">{{ $index + 1 }}</span>
                    @else
                    <span class="Stylist-Badge">{{ $index + 1 }}</span>
                    @endif
                </div>
                @endforeach
            </div>
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/?order=view') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
            </div>
            @endif
        </div>
        <div class="Grid-Content">
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>
</div>

<hr class="section-border" />

@endsection
