<div class="Heading">
    <h3 class="Heading-Text">スタイリストランキング</h3>
</div>

<ul class="Ranking">
    @foreach ( $ranking as $stylist )
    <li class="Ranking-Item">
        <a href="{{ $stylist->getProfileURL() }}">
            <img src="{{ $stylist->getIconImage() }}" alt="{{ $stylist->nickname }}" width="64" class="round-image">
            <div class="Ranking-User">
                <strong class="Ranking-UserName">{{ $stylist->nickname }}</strong>
                <span class="Ranking-UserInfo">{{ $stylist->areaname }}</span>
            </div>
        </a>
    </li>
    @endforeach
</ul>

<div class="More">
    <a href="{{ AppUrl::to('stylist/?order=view') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっとみる</a>
</div>
