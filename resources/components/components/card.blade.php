<div class="Card">
    <a href="{{ $photo->getPhotographURL() }}">
        <img src="{{ $photo->getFilePath() }}" alt="{{ $photo->nickname . 'さんのヘアスナップ' }}" class="image-max">
        <section class="Card-Section R-Hidden">
            <h3 class="Card-Name">{{ $photo->nickname }}</h3>
            <span class="Card-Type">{{ $photo->text_content }}</span>
            <div class="Card-Stats">
                <span class="Card-Stat Card-Stat--like"><i class="Icon Icon-ic_like"></i>{{ k_format($photo->like_amount) }}</span>
                <span class="Card-Stat Card-Stat--view"><i class="Icon Icon-ic_view"></i>{{ k_format($photo->views) }}</span>
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
