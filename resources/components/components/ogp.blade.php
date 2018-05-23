@if ( false !== strpos(Request::path(), "article") )
<meta property="og:type" content="article" />
@else
<meta property="og:type" content="website" />
@endif
<meta property="og:title" content="{{ $pageMeta->getTitle() }}" />
<meta property="og:url" content="{{ AppUrl::current(['order']) }}" />
<meta property="og:site_name" content="HAIR（ヘアー）" />
{{-- Custom OGP Image --}}
@if ( isset($customOGPImage) )
<meta property="og:image" content="{{ $customOGPImage }}" />
@else
<meta property="og:image" content="https://d3kszy5ca3yqvh.cloudfront.net/etc/hair-ogp.png" />
@endif
<meta property="og:description" content="HAIR（ヘアー）はスタイリスト・モデルが発信するヘアスタイルを中心に、トレンド情報が集まるサイトです。10万枚以上のヘアスナップから髪型・ヘアアレンジをチェックしたり、ファッション・メイク・ネイル・恋愛の最新まとめが見つかります。" />
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:site" content="@haircm" />
<meta property="twitter:domain" content="hair.cm" />
<meta property="twitter:description" content="HAIR（ヘアー）はスタイリスト・モデルが発信するヘアスタイルを中心に、トレンド情報が集まるサイトです。10万枚以上のヘアスナップから髪型・ヘアアレンジをチェックしたり、ファッション・メイク・ネイル・恋愛の最新まとめが見つかります。" />
<meta itemprop="image" content="https://d3kszy5ca3yqvh.cloudfront.net/etc/hair-ogp-twitter.png" />

