@extends("global")

@section("contents")

@include("components.breadcrumb")
@include("components.stylist_profile", ["stylist" => $stylist])
@include("components.stylist_stat_menu", ["current" => $current, "stylist" => $stylist, "stats" => $stats, "show" => true])

<div class="Content R-Hidden">
    <div class="Heading section-spacing">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>
    <div class="Grid Grid4">
        @foreach ( $photographs as $photograph )
        <div class="Card Card-Overlay">
            <a href="{{ $photograph->getPhotographURL() }}">
                <img src="{{ $photograph->getFilePath() }}" alt="" class="image-max">
                <div class="Card-Stats">
                    <span class="Card-Stat Card-Stat--like"><i class="Icon Icon-ic_like"></i>{{ k_format($photograph->likes) }}</span>
                    <span class="Card-Stat Card-Stat--view"><i class="Icon Icon-ic_view"></i>{{ k_format($photograph->views) }}</span>
                </div>
           </a>
        </div>
        @endforeach
    </div>
</div>

@include("components.pagination", ["pager" => $photographs, "hide" => true])

@endsection
