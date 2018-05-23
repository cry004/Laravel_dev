@if ( isset($show) && $show === true )
<nav class="StatList section-spacing">
@else
<nav class="StatList section-spacing R-Hidden">
@endif
    <ul class="Content StatList-Items align-center">
        @if ( $current === "snap" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->photographs === 0 )
            <div class="NoLink"><span>{{ $stats->photographs }}</span>ヘアスナップ</div>
            @else
            <a href="{{ $stylist->getProfileURL('snap') }}"><span>{{ k_format($stats->photographs) }}</span>ヘアスナップ</a>
            @endif
        </li>
{{--
        @if ( $current === "video" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->videos === 0 )
            <div class="NoLink"><span>{{ $stats->videos }}</span>動画</div>
            @else
            <a href="{{ $stylist->getProfileURL('video') }}"><span>{{ k_format($stats->videos) }}</span>動画</a>
            @endif
        </li>
--}}
        @if ( $current === "pickup" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->pickups === 0 )
            <div class="NoLink"><span>{{ $stats->pickups }}</span>掲載実績</div>
            @else
            <a href="{{ $stylist->getProfileURL('achievement') }}"><span>{{ k_format($stats->pickups) }}</span>掲載実績</a>
            @endif
        </li>
        @if ( $current === "follow" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->followings === 0 )
            <div class="NoLink"><span>{{ $stats->followings }}</span>フォロー</div>
            @else
            <a href="{{ $stylist->getProfileURL('follow') }}"><span>{{ k_format($stats->followings) }}</span>フォロー</a>
            @endif
        </li>
        @if ( $current === "follower" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->followers === 0 )
            <div class="NoLink"><span>{{ $stats->followers }}</span>フォロワー</div>
            @else
            <a href="{{ $stylist->getProfileURL('follower') }}"><span>{{ k_format($stats->followers) }}</span>フォロワー</a>
            @endif
        </li>
        @if ( $current === "like" )
        <li class="StatList-Item StatList-Item--active">
        @else
        <li class="StatList-Item">
        @endif
            @if ( (int)$stats->likes === 0 ) 
            <div class="NoLink"><span>{{ $stats->likes }}</span>いいね</div>
            @else
            <a href="{{ $stylist->getProfileURL('like') }}"><span>{{ k_format($stats->likes) }}</span>いいね</a>
            @endif
        </li>
        @if ( $current === "recommend" )
        <li class="StatList-Item StatList-Item--active StatList-Item-More">
        @else
        <li class="StatList-Item StatList-Item-More">
        @endif
            <a href="#" class="StatList-More">more</a>
            <ul class="StatList-More-Lists">
                <li class="StatList-More-List-Item">
                    @if ( (int)$stats->recommends === 0 )
                    <div class="NoLink">スタイリストのオススメ<span>{{ $stats->recommends }}</span></div>
                    @else
                    <a href="{{ $stylist->getProfileURL('recommend') }}">スタイリストのオススメ<span>{{ k_format($stats->recommends) }}</span></a>
                    @endif
                </li>
            </ul>
        </li>
    </ul>
</nav>
