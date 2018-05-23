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
        @foreach ( $followers as $follower )
        <li class="Follow-Item">
            @if ( (int)$follower->type > 0 )
            <a href="{{ $follower->getProfileURL() }}" class="Follow-Item-Link">
            @endif
            <img src="{{ $follower->getUserIconImage() }}" alt="{{ $follower->nickname }}" width="100" class="round-image js-FallbackIcon" data-fallbackimage="{{ AppUrl::asset('images/users-icon-default.jpg') }}">
            <div class="Follow-Item-User">
                <h3>{{ $follower->nickname }}{{ ( !empty($follower->shop_name) ) ? ' | ' . $follower->shop_name : '' }}</h3>
                <span>{{ $follower->getTypeString() }}</span>
                <span>{{ $follower->areaname }}</span>
            </div>
            @if ( (int)$follower->type > 0 )
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

@include("components.pagination", ["pager" => $followers])

@endsection
