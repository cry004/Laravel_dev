<nav class="Breadcrumb Breadcrumb-Header R-Hidden">
    <ul class="Breadcrumb-Links">
        @foreach ( $pageMeta->getBreadcrumb() as $b )
        <li class="Breadcrumb-Link">
            @if ( $b["link"] )
            <a href="{{ $b['link'] }}">{{ $b["title"] }}</a>
            @else
            <strong>{{ $b["title"] }}</strong>
            @endif
        </li>
        @endforeach
    </ul>
</nav>
