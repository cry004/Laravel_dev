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
                --><li class="Tab-Item Tab-Item--active"><a href="{{ AppUrl::to('tag/' . $tag->id) }}" class="align-center">新着</a></li><!--
                --><li class="Tab-Item"><a href="{{ AppUrl::to('tag/' . $tag->id . '/?order=view') }}" class="align-center">ランキング</a></li><!--
            --></ul>

            @if ( count($articles) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関する新着記事</h2>
            </div>

            @include("components.article_list", ["articles" => $articles])
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/news/') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
            </div>
            @endif

            @if ( count($snaps) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関する新着ヘアスナップ</h2>
            </div>

            <div class="Grid Grid3 section-spacing">
                @foreach ( $snaps as $index => $snap )
                @include("components.card", ["photo" => $snap, "index" => null])
                @endforeach
            </div>
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/snap/') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
            </div>
            @endif

            @if ( count($stylists) > 0 )
            <div class="Heading section-spacing Heading-NoMargin">
                <h2 class="Heading-Text Heading-Text-Small">「{{ $tag->text_content }}」に関する新着スタイリスト</h2>
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
                </div>
                @endforeach
            </div>
            <div class="More More-OffsetH">
                <a href="{{ AppUrl::to('tag/' . $tag->id . '/stylist/') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
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
