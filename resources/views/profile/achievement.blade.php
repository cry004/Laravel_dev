@extends("global")

@section("contents")

@include("components.breadcrumb")
@include("components.stylist_profile", ["stylist" => $stylist])
@include("components.stylist_stat_menu", ["current" => $current, "stylist" => $stylist, "stats" => $stats])

<div class="Content">
    <div class="Heading section-spacing Heading-BackLink Heading-NoMargin">
        <h1 class="Heading-Text"><a href="{{ $stylist->getProfileURL() }}">{{ $pageMeta->getHeading() }}</a></h1>
    </div>
    <ul class="Pickuped section-spacing">
        @foreach ( $pickups as $pickup )
        <li class="Pickuped-Item">
            <a href="{{ $pickup->http_url }}">
                <img src="{{ config('aws.photo_large') }}/{{ $pickup->image_path }}" alt="{{ $pickup->title }}" width="140">
                <p class="Pickuped-Title">{{ $pickup->title }}</p>
            </a>
            @if ( $pickup->logo_image )
            <img src="{{ config('aws.cloudfront') }}/{{ $pickup->logo_image }}" class="Pickuped-MediaLogo" height="17">
            @endif
        </li>
        @endforeach
    </ul>
</div>

@include("components.pagination", ["pager" => $pickups])
<section class="Content-Short">
    <div class="Article Achievement-Notice">
        <h4>掲載実績について重要なお知らせ</h4>
        <p>HAIR以外の媒体での掲載実績につきましては、2016年12月以降お受けすることができません。<br>誠に恐れ入りますがご了承のほどよろしくお願い申し上げます。</p>
    </div>
</section>
@endsection
