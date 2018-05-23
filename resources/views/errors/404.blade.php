<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>404 Page Not Found</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="{{ AppUrl::asset('css/index.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ AppUrl::asset('css/index.responsive.css') }}">
        <meta name="robots" content="noindex">
    </head>
    <body>
        <div class="Pages" id="pt">
            <!-- header -->
            <header class="Header Header-System Flip">
                <div class="Flip-Container">
                    <div class="Flip-Front">
                        <div class="Content">
                            <div class="Header-Logo"><i class="Icon Icon-HAIR-logo"></i></div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /header -->

            <div class="Page">

                <div class="Content SystemMessage">
                    <h1>ページが見つかりません</h1>

                    <div class="SystemMessage-Body align-center">
                        お探しのページが見つかりませんでした。<br>
                        URLをお確かめ下さい。
                        <div class="SystemMessage-Guide">
                            <a href="/" class="Button Button-Round Button-Primary">HAIRトップに戻る</a>
                        </div>
                    </div>
                </div>

                <hr class="section-border" />

                @include("components.app_link")
                @include("components.social_buttons")
                @include("components.sitemap")
                <div class="Content CopyRight">
                    <p>Copyright&copy; Richmedia Co. Ltd All Rights reserved.</p>
                </div>
            </div>
        </div>
    </body>
</html>
