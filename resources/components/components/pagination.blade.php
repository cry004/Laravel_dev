<?php
    $diff = 3;
    // first page
    $first = $pager->currentPage() - $diff;
    if ($first < 1) {
        $first = 1;
    }
    // last page
    $last = $pager->currentPage() + $diff;
    if ($last >= $pager->lastPage()) {
        $last = $pager->lastPage();
    } else {
        $isMore = true;
    }
?>
@if ( isset($hide) && $hide === true )
<div class="Pager section-spacing R-Hidden">
@else
<div class="Pager section-spacing">
@endif
    <div class="R-Hidden">
        @if ( $pager->currentPage() > 2 )
            <div class="Pager-Item"><a href="{{ $pager->url(1) }}">最初へ</a></div>
        @endif
        @if ( $pager->currentPage() > 1 )
            <div class="Pager-Item"><a href="{{ $pager->previousPageUrl() }}">前へ</a></div>
        @endif

        @for ( $i = $first; $i <= $last; $i++ )
            @if ( $i == $pager->currentPage() )
            <div class="Pager-Item Pager-Item--current"><span>{{ $i }}</span></div>
            @else
            <div class="Pager-Item"><a href="{{ $pager->url($i) }}">{{ $i }}</a></div>
            @endif
        @endfor

        @if ( ($pager->lastPage() - $last) > 1 )
            <div class="Pager-Item"><span>･･･</span></div>
        @endif

        @if ( isset($isMore) )
            <div class="Pager-Item"><a href="{{ $pager->url($pager->lastPage()) }}">{{ $pager->lastPage() }}</a></div>
        @endif

        @if ( $pager->hasMorePages() )
            <div class="Pager-Item"><a href="{{ $pager->nextPageUrl() }}">次へ</a></div>
        @endif
        @if ( isset($isMore) )
            <div class="Pager-Item"><a href="{{ $pager->url($pager->lastPage()) }}">最後へ</a></div>
        @endif
    </div>
    <div class="Pager-Sp R-Show">
        @if ( $pager->currentPage() > 1 )
        <div class="Pager-Item--before"><a href="{{ $pager->previousPageUrl() }}"><i class="Icon Icon-ic_keyboard_arrow"></i></a></div>
        @endif
        {{ $pager->currentPage() }} / {{ $pager->lastPage() }}
        @if ( $pager->hasMorePages() )
        <div class="Pager-Item--after"><a href="{{ $pager->nextPageUrl() }}"><i class="Icon Icon-ic_keyboard_arrow"></i></a></div>
        @endif
    </div>
</div>
