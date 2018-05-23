@extends("global")

@section("contents")

@include("components.breadcrumb")
@include("components.stylist_profile", ["stylist" => $stylist])
@include("components.stylist_stat_menu", ["current" => $current, "stylist" => $stylist, "stats" => $stats])

<div class="Content">
    <div class="Heading section-spacing Heading-BackLink Heading-NoMargin">
        <h1 class="Heading-Text"><a href="{{ $stylist->getProfileURL() }}">{{ $pageMeta->getHeading() }}</a></h1>
    </div>
    <div class="RecommendItems section-spacing">
        @foreach ( $items as $item )
        <figure class="RecommendItem">
            <a href="{{ $item->url }}" target="_blank">
                <div class="RecommendItem-Image">
                    <img src="{{ config('aws.photo_middle') }}/{{ $item->filepath }}" width="255" alt="{{ $item->title }}" class="image-max">
                </div>
                <figcaption class="RecomemndItem-Name">{{ $item->title }}</figcaption>
            </a>
        </figure>
        @endforeach
    </div>
</div>

@include("components.pagination", ["pager" => $items])

@endsection
