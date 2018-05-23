<div class="Page-Responsive">
    <!-- responsive navigation -->
    <nav class="RNavi">
        <ul class="RNavi-Links">
            <li class="RNavi-Link">
                <a href="{{ AppUrl::to() }}"><span>HOME</span></a>
            </li>
            <li class="RNavi-Link">
                <a href="{{ AppUrl::to('snap') }}"><span>SNAP</span></a>
            </li>
            <li class="RNavi-Link">
                <a href="{{ AppUrl::to('stylist') }}"><span>STYLIST</span></a>
            </li>
            <li class="RNavi-Link">
                <a href="{{ AppUrl::to('news') }}"><span>NEWS</span></a>
            </li>
            {{--
            <li class="RNavi-Link">
                <a href="{{ AppUrl::to('talk') }}"><span>TALK</span></a>
            </li>
            --}}
        </ul>
    </nav>
    <!-- /responsive navigation -->

    <!-- responsive-heading -->
    <div class="RHeading">
        <h3>NEWSカテゴリ一覧</h3>
    </div>
    <!-- /responsive-heading -->

    <!-- responsive category navigation -->
    <nav class="RCNavi">
        <ul class="RCNavi-Links">
            @foreach ( $categories as $category )
            <li class="RCNavi-Link">
                <a href="{{ AppUrl::to('tag/' . $category->keyword_id) }}">
                    <img src="{{ $category->eye_catch }}" class="RCNavi-Image" alt="{{ $category->name }}">
                    <div class="RCNavi-Text">{{ $category->name }}</div>
                </a>
            </li>
            @endforeach
        </ul>
    </nav>
</div>
