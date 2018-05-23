<input type="checkbox" name="0" value="1" id="navigation-trigger" class="hidden">
<input type="checkbox" name="1" value="1" id="search-trigger" class="hidden">
    <div class="GotoApp">
        <div class="App-Logo"><img src="/images/applogo.png" width="32" height="32"></div>
        <div class="App-Text">
            <span>HAIR</span><br>
            アプリでもっとヘアスタイルに出会おう
        </div>
        <div class="App-Download"><a href="//hair.cm/app/" target="_blank">ダウンロード</a></div>
    </div>
<!-- header -->
<header class="Header Flip">
    <div class="Flip-Container">
        <div class="Flip-Front">
            <div class="Content">
                <label class="RHeader-Menu-Button R-Show" for="navigation-trigger"><i class="Icon Icon-ic_menu"></i></label>
                <label class="RHeader-Search-Button Opener R-Show" for="search-trigger"><i class="Icon Icon-ic_search"></i></label>
                <div class="Header-Logo">
                    <a href="{{ AppUrl::to() }}"<i class="Icon Icon-HAIR-logo"></i></a>
                </div>
                @if ( isset($extraGlobalHeading) )
                <h1 class="Header-Caption R-Hidden">HAIR [ヘアー] ヘアスタイルで毎日が変わる。新しい私を楽しもう。</h1>
                @else
                <p class="Header-Caption R-Hidden">HAIR [ヘアー] ヘアスタイルで毎日が変わる。新しい私を楽しもう。</p>
                @endif
                {!! Form::open(["url" => AppUrl::to("search"), "method" => "GET", "class" => "Header-Search R-Hidden js-Search"]) !!}
                <!-- <form method="GET" action="http://9f52fc49.ngrok.io/search/" accept-charset="UTF-8" class="Header-Search R-Hidden js-Search"> -->
                    <input type="text" class="Header-Search-Input" name="q" placeholder="キーワード検索" value="{{ ( isset($query) ) ? $query : '' }}">
                    <button type="submit" class="Header-Search-Options"><i class="Icon Icon-ic_search"></i></button>
                {!! Form::close() !!}
                {{-- @future
                <ul class="Header-Icons">
                    <li class="Header-Icon">
                        <a href="{{ AppUrl::to('mypage') }}" title="MyPage"><i class="Icon Icon-People"></i></a>
                    </li>
                    <li class="Header-Icon">
                        <a href="{{ AppUrl::to('snap') }}" title="Snap"><i class="Icon Icon-Camera"></i></a>
                    </li>
                </ul>
                // @future --}}
            </div>
        </div>
        <div class="Flip-Back R-Show">
            <!-- responsive search -->
            {!! Form::open(["url" => AppUrl::to("search"), "method" => "GET", "class" => "RHeader-Search js-Search"]) !!}
                <input type="text" class="Header-Search-Input" placeholder="キーワード検索" value="{{ ( isset($query) ) ? $query : '' }}"><!--
                --><button type="submit" class="Header-Search-Options"><i class="Icon Icon-ic_search"></i></button>
            {!! Form::close() !!}
             <label class="RHeader-Search-Button Closer R-Show" for="search-trigger"><i class="Icon Icon-cross"></i></label>
            <!-- /responsive search -->
        </div>
    </div>
</header>
<!-- /header -->
