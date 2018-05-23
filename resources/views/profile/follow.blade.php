@extends("global")

@section("contents")

@include("components.breadcrumb")
@include("components.stylist_profile", ["stylist" => $stylist])
@include("components.stylist_stat_menu", ["current" => $current, "stylist" => $stylist, "stats" => $stats])

<div class="Content">
    <div class="Heading section-spacing Heading-BackLink Heading-NoMargin">
        <h1 class="Heading-Text"><a href="{{ $stylist->getProfileURL() }}">{{ $pageMeta->getHeading() }}</a></h1>
    </div>
    <ul class="Follow section-spacing">
        @foreach ( $follows as $follow )
        <li class="Follow-Item">
            @if ( (int)$follow->type > 0 )
            <a href="{{ $follow->getProfileURL() }}" class="Follow-Item-Link">
            @endif
            <img src="{{ $follow->getUserIconImage() }}" alt="{{ $follow->nickname }}" width="100" class="round-image js-FallbackIcon" data-fallbackimage="{{ AppUrl::asset('images/users-icon-default.jpg') }}">
            <div class="Follow-Item-User">
                <h3>{{ $follow->nickname }}{{ ( !empty($follow->shop_name) ) ? ' | ' . $follow->shop_name : '' }}</h3>
                <span>{{ $follow->getTypeString() }}</span>
                <span>{{ $follow->areaname }}</span>
            </div>
            @if ( (int)$follow->type  > 0 )
            </a>
            @endif
            {{--
            <a href="#" class="Follow-Item-Action">
                <i class="Icon Icon-ic_follow"></i>
            </a>
            --}}
        </li>
        @endforeach
    </ul>
</div>

@include("components.pagination", ["pager" => $follows])

@endsection
