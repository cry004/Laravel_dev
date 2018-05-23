<div class="Card">
    <a href="{{ $stylist->getProfileURL() }}">
        <img src="{{ $stylist->photo->getFilePath() }}" alt="{{ $stylist->nickname . 'さんのヘアスナップ' }}" class="image-max">
        <section class="Card-Section">
            <h3 class="Card-Name">{{ $stylist->nickname }}</h3>
            <span class="Card-Type">{{ $stylist->areaname }}</span>
            <div class="Card-Stats R-Hidden">
                <span class="Card-Stat Card-Stat--like"><i class="Icon Icon-ic_like"></i>{{ k_format($stylist->like_amount) }}</span>
                <span class="Card-Stat Card-Stat--view"><i class="Icon Icon-ic_view"></i>{{ k_format($stylist->views) }}</span>
            </div>
        </section>
        @if ( isset($index) )
            @if ( $index === 1 )
            <span class="Card-Badge Card-Badge-First bold-text">{{ $index }}</span>
            @elseif ( $index === 2 )
            <span class="Card-Badge Card-Badge-Second bold-text">{{ $index }}</span>
            @elseif ( $index === 3 )
            <span class="Card-Badge Card-Badge-Third bold-text">{{ $index }}</span>
            @else
            <span class="Card-Badge bold-text">{{ $index }}</span>
            @endif
        @endif
    </a>
</div>
