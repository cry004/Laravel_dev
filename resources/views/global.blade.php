<!doctype html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ $pageMeta->getTitle() }}</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="{{ $pageMeta->getDescription() }}">
        <meta name="keywords" content="{{ $pageMeta->getKeywords() }}">
        <meta name="format-detection" content="telephone=no">
        @include("components.ogp")
        @if ( isset($pageNoIndex))
        <meta name="robots" content="noindex,nofollow">
        @endif
        {!! $pageMeta->getCanonicalLink() !!}
        @if ( isset($canonicalMaxPage) )
            {!! $pageMeta->getCanonicalLinkNext($canonicalMaxPage) !!}
            {!! $pageMeta->getCanonicalLinkPrev() !!}
        @endif
        @if ( isset($ampPageUrl) )
        <link rel="amphtml" href="{{ $ampPageUrl }}">
        @endif
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="{{ AppUrl::asset('css/index.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ AppUrl::asset('css/index.responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ AppUrl::asset('css/shops.css') }}">
        <link rel="shortcut icon" href="https://d3kszy5ca3yqvh.cloudfront.net/etc/favicon.ico" type="image/vnd.microsoft.ico">
        <link rel="icon" href="https://d3kszy5ca3yqvh.cloudfront.net/etc/favicon.ico" type="image/x-icon">
        @yield("extra_stylesheets", "")
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T4HQBW');</script>
		<!-- End Google Tag Manager -->

        <link rel="manifest" href="/manifest.json">
        <script
                src="https://code.jquery.com/jquery-1.12.4.min.js"
                integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
                crossorigin="anonymous"></script>
    </head>
    <body>

    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T4HQBW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @if ( !isset($noneedFacebook) )
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8&appId=494575087228796";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        @endif
        @yield("extra_global")

        <div class="Pages Appshow" id="pt">
            @include("components.header")
            <div class="Page">
                @include("components.global_navigation", ["exclass" => ""])

                @yield("contents")

                @include("components.app_link")
                @include("components.global_navigation", ["exclass" => "GNavi-Footer"])
                <div class="PageTop R-Show">
                    <a href="#pt"><i class="Icon Icon-ic-arrow-top"></i><br>ページトップ</a>
                </div>
                @include("components.social_buttons")
                @include("components.sitemap")
                <div class="Content CopyRight">
                    <p>Copyright&copy; Richmedia Co. Ltd All Rights reserved.</p>
                </div>
            </div>
            @include("components.responsive_navigation")
        </div>
        <script src="{{ AppUrl::asset('js/app.js') }}"></script>
        @yield("extra_javascripts", "")

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var registerSubscription = function (subscription) {
                if (subscription) {
                    console.log(subscription.endpoint);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: "/push/register",
                        data: {
                            "endpoint": subscription.endpoint,
                            "signature":"hair-web"
                        }
                    });
                }
            };
            navigator.serviceWorker.ready.then(function (sw) {
                sw.pushManager.getSubscription().then(function (subscription) {
                    if (subscription === null) {
                        sw.pushManager.subscribe({userVisibleOnly: true}).then(registerSubscription);
                    }
                });
            });
            navigator.serviceWorker.register("/push.js").then();
        });
    </script>
    </body>
</html>

