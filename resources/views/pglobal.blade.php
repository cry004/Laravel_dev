<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# <?php //echo $this->escape($this->ogType) ?>: http://ogp.me/ns/fb/<?php //echo $this->escape($this->ogType) ?>#">
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">


</head>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-49269730-3', 'hair.cm');
    ga('send', 'pageview');
</script>

<body>
@yield('extraCss')
<header>
    <div>
        <a href="https://hair.cm"><img src="http://hair.cm/wp-content/themes/hair-theme/img/HAIRbyTiful_trans.png" id="top-logo"/></a>
    </div>
</header>
@yield('contents')

<div id="pops-dl">
    <h2 class="headline-m">トレンドのヘアスタイルスナップが13万枚！<br>HAIRアプリを今すぐダウンロード！</h2>
</div>

<div id="footer">
    <div>
        <a href="/agreement.html">利用規約</a>
        <a href="/privacy.html">プライバシーポリシー</a>
    </div>
    <a href="/support.html">お問い合わせ</a>
    <div id="cp">
        Copyright&copy; 2014 RichMedia Co., Ltd. All rights reserved
    </div>
</div>
</div>
</body>
</html>
