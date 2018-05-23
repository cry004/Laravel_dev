<!-- global navigation -->
<nav class="GNavi">
    <ul class="GNavi-Links align-center">
        @if ( $current === "home" )
        <li class="GNavi-Link GNavi-Link--active">
        @else
        <li class="GNavi-Link">
        @endif
            <a href="{{ AppUrl::to() }}"><span>HOME</span></a>
        </li>
        @if ( $current === "snap" )
        <li class="GNavi-Link GNavi-Link--active">
        @else
        <li class="GNavi-Link">
        @endif
            <a href="{{ AppUrl::to('snap') }}"><span>SNAP</span></a>
        </li>
        @if ( $current === "stylist" )
        <li class="GNavi-Link GNavi-Link--active">
        @else
        <li class="GNavi-Link">
        @endif
            <a href="{{ AppUrl::to('stylist') }}"><span>STYLIST</span></a>
        </li>
        @if ( $current === "news" )
        <li class="GNavi-Link GNavi-Link--active">
        @else
        <li class="GNavi-Link">
        @endif
            <a href="{{ AppUrl::to('news') }}"><span>NEWS</span></a>
        </li>
{{--
        @if ( $current === "talk" )
        <li class="GNavi-Link GNavi-Link--active">
        @else
        <li class="GNavi-Link">
        @endif
            <a href=" {{ AppUrl::to('talk') }}"><span>TALK</span></a>
        </li>
--}}
    </ul>
</nav>
<!-- /global navigation -->
