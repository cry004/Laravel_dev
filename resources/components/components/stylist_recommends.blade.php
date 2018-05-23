@if ( count($stylists) > 0 )
<div class="Heading section-spacing">
    <h3 class="Heading-Text">この記事のスタイリスト</h3>
    <span class="Heading-Sub R-Hidden">この記事のヘアスタイルを作ったスタイリスト</span>
</div>

<ul class="StylistRecommend">
@foreach ( $stylists as $stylist )
    <li class="StylistRecommend-Item">
        <a href="{{ $stylist->getProfileURL() }}">
            <figure>
                <img src="{{ $stylist->getIconImage() }}" height="40" class="round-image">
                <figcaption>
                    <span class="StylistRecommend-Name text-ellipsis">{{ $stylist->nickname }}</span>
                    @if ( ! empty($stylist->shop_name) && ! $isTieup )
                    <span class="StylistRecommend=Salon text-ellipsis">{{ $stylist->shop_name }}</span>
                    @endif
                </figcaption>
            </figure>
        </a>
    </li>
@endforeach
</ul>
@endif
