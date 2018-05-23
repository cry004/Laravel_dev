<!doctype html>
<html ⚡>
  <head>
    <meta charset="utf-8">
    <title>{{ $pageMeta->getTitle() }}</title>
    <link rel="canonical" href="{{ AppUrl::current() }}">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <style amp-custom>
@font-face {
  font-family: 'icomoon';
  src:  url('{{ AppUrl::asset("css/fonts/icomoon.eot?dvfn61") }}');
  src:  url('{{ AppUrl::asset("css/fonts/icomoon.eot?dvfn61#iefix") }}') format('embedded-opentype'),
    url('{{ AppUrl::asset("css/fonts/icomoon.ttf?dvfn61") }}') format('truetype'),
    url('{{ AppUrl::asset("css/fonts/icomoon.woff?dvfn61") }}') format('woff'),
    url('{{ AppUrl::asset("css/fonts/icomoon.svg?dvfn61#icomoon") }}') format('svg');
  font-weight: normal;
  font-style: normal;
}
[class^="Icon-"], [class*=" Icon-"] {
  font-family: 'icomoon';
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  display: inline-block;
  vertical-align: middle;
  margin-right: 6px;
  margin-bottom: 2px;
  font-size: 1.2em;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.Icon-HAIR-logo {
    font-size: 46px;
}
.Icon-HAIR-logo:before {
  content: "\e909";
}
body {
    background-color: #F4F4F4;
}
a {
    color: #000;
    text-decoration: none;
}
.header {
    text-align: center;
    padding: 0;
    border-bottom: solid 1px #ccc;
    background-color: white;
}
.title {
    font-size: 1.1em;
    padding: 8px;
}
.content {
    padding: 0 8px 20px 8px;
    line-height: 1.8;
    font-size: .9em;
    background-color: white;
}
.content h2 {
    margin: 10px 0;
    border-bottom: solid 2px #00B5C1;
    padding: 6px 0;
    font-size: 1.2em;
}
.content h3 {
    margin: 10px 0;
    border-left: solid 6px #00B5C1;
    padding-left: 10px;
    font-size: 1.0em;
}
.content h4 {
}
.content h4:before {
    content: "";
    display: inline-block;
    width: 14px;
    height: 14px;
    background-color: #00B5C1;
    margin-right: 10px;
}
.content blockquote {
    background-color: #F4F4F4;;
    margin: 20px;
    padding: 30px 40px;
    font-size: .9em;
    position: relative;
}
.content blockquote:before,
.content blockquote:after {
    content: "";
    display: block;
    width: 16px;
    height: 16px;
    position: absolute;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAD4UlEQVR4Ae2bA6xfSxDG+6za9g1q27btqLZ9bbO2FTWobbt9tW27/abJFpfnzO6eapNMr3rmm/mtZ88/WaNeg35qMwAMAE2OXV1df/+pALx79+4Xb2/vVr6+vkdhb/z8/N75+PhMBIhfv1ZyiCcDYgmFXYc9gB3z9PTMoxwAEq0D53so6diG3093OnF/f/8U0HWDPYwnnqsEQQkAOKwAhxtii8QjWtSJxMPDw/9CYwyG3q3E4sH/mSEFAN06OUTmC4cWACzUnTw0qsAuWoznFSw3C0BAQEA+PHxYOLMo+Abd0kVj8gMoKTsxoRfE2AaAh+pB6K5wYhPCVA0rzb/wO5cZz3MvL68sdsb7SDG7MwVfoBdkVdjqedEgB5jxiF4QZFVsMlMktmAdRctbIdETJW2dleSHyAoJQ+DNZJMPCgpKD19nVcSD3HYk1e0bUrdXJPYGAIpIjvk/4WeTqgah+SOx5AvS7kmR0HN87aVgwzVNYfIbAgMDMybYzfAfzigSWobA8ytIfrCieC7ButDWnfzGe4iB2EYFE95OfK2kaKvdQHYo4vlH8DMuODj4n8TOAiTWWVLoKny0F4RlbfHixb/JTnq09cUGLrOl0yAeOCQhdoHWZ9mkY8XTTrJBxlo+DtNOT4LyObG/Vmnwu08CwEhb9QDaGDCTP42vOVUnD5+1JVp+iBWNz8/QpZhCz+iApOmQs5oZU6RVjc/FFjNb31NH8jiolGAmfxMrWWpbAPDA33ScZIhdphOZDgAAG8bs/j3s6Aix0kzabhrP+JsY8dylqpBtAESNIfbWwpLHLrBSPY8xHKPsagnakxgAtmgsarow56PSLAB4cDdDLEIXAPhvw2iQ15MmTfrDNgDa+9NpjQGgvy4A8O3L6AFnWRcjdEZnzrb1NU6AKxk9YCVHi8S6cQBorvLeZACI5mhRd3NliL3SdfdHVR/mBDiQCyCIs/fXOP7TMQE04g6BSQzB/XRyTMrgu6TdgDw9PXMxAfRMKh78v7qwVLEBzLcqwgzsAKyJnZK3znioMgSLpus9AWC5RkEheoPGtsU9QDmOBqNh+goAGxwS7GhxBajlRDzQOUF6/IqLnoMTAWjO0mCY6AGnviUAVJR1GsD1bwkAXaA4DeDJtwQAq8BwRwFoE+APAdefGgD9PwPAADAADAADwAAwAAwAA0CzGQAGgAFgABgAEDzukGAbi/WAtg41yDFRFO3vgNhlq1dpdMXtUJmuF+l9+IQVIITgF/c0Jb8BZa6aNt8PqAvbrKk8fwcxBYp3m774+An+WJYuJlSZ7OtzdAOtMh7Kj14IMx+d/WgGgAHwHmSEQUWWqu7RAAAAAElFTkSuQmCC);
    background-repeat: no-repeat;
    background-position: left top;
    background-size: 16px 16px;
}
.content blockquote:before {
    top: 10px;
    left: 10px;
}
.content blockquote:after {
    bottom: 10px;
    right: 10px;
    transform: rotate(180deg);
}
.content blockquote p {
    margin: 0;
}
.content a {
    color: #00B5C1;
}

.Heading {
    text-align: center;
    border-top: 1px solid #d6d7d9;
    background-color: #fff;
    margin-top: 10px;
}
.Heading-Sub{
    display: none;
}
.Heading-Text {
    font-size: 1em;
    margin: 0;
    padding: 10px 2px;
}
.ArticleList {
    list-style: none outside;
    margin: 0;
    padding: 0;
    text-align: left;
}

.Article-Image {
    width: 64px;
    margin: 3px;
    float: left;
}
.Article {
    border: none;
    border-bottom: 1px solid #e4e4e4;
    padding: 10px;
    margin-bottom: 0;
    background-color: #fff;
}
.Article-Stats{
    display: none;
}
.Article-Text:after {
    content: "";
    clear: both;
    display: table;
}
.R-Hidden{
    display: none;
}
.Article-Text h3 {
    font-size: .8em;
    margin: 0;
    line-height: 1.6;
}
.Entry {
    margin-bottom: 0;
    background-color: #fff;
    padding: 5px;
    border-top: 1px solid #d6d7d9;
}

.Entry amp-img{
    width: 64px;
    margin: 3px;
    float: left;
    border-radius: 4px;
}
.Entry:after {
    content: "";
    clear: both;
    display: table;
}
.Entry-View{
    display: none;
}
.Grid-Content img {
    width: 64px;
    vertical-align: middle;
    float: left;
    border-radius: 4px;
}
.AppLink-Buttons amp-img {
    width: 45%;
    margin: 2.5%;
    float: left;
}

.Banner-Large img {
    max-width: 100%;
}
.footer {
    padding: 10px 0;
    background-color: #F4F4F4;
    text-align: center;
    font-size: .7em;
}
    </style>
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "NewsArticle",
      "author": {
        "@type": "Organization",
        "name": "hair"
      },
      "publisher": {
        "@type": "Organization",
        "name": "hair",
        "logo": {
          "@type": "ImageObject",
          "url": "https://d3kszy5ca3yqvh.cloudfront.net/etc/hair-ogp-twitter.png",
          "width": 102,
          "height": 51
        }
      },
      "headline": "{{ $article->title }}",
      "image": {
        "@type": "ImageObject",
         "url": "{{ $article->eyecatch }}",
         "height": 600,
         "width": 800
      },
      "datePublished": "{{ format_utc_date($article->post_date) }}",
      "dateModified": "{{ format_utc_date($article->modified_at) }}",
      "mainEntityOfPage": null
    }
    </script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <!-- AMP Analytics -->
      <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  </head>
<body>
<!-- Google Tag Manager -->
<amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-TM7J883&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
<header class="header">
    <i class="Icon Icon-HAIR-logo"></i>
</header>
<h1 class="title">{{ $article->title }}</h1>
<article class="content">
{!! article_amp_format($article->content) !!}
</article>



  <div class="Grid-Content Heading">
      <h2 class="Heading-Text">関連記事</h2>
        @includeForAMP("components.related_article_list", ["articles" => $relatedArticles]) 
  </div>


    @includeForAMP("banners.voce")

    <div class="Grid-Content">
        @includeForAMP("components.owner_pickup_articles")
        @includeForAMP("components.keyword_article_recent",  ["currentKeywordId" => $article->keyword_id, "more" => false])
        @includeForAMP("banners.line")
    </div>

@includeForAMP("components.app_link")
<footer class="footer">
    <p>Copyright&copy; Richmedia Co. Ltd All Rights reserved.</p>
</footer>
</body>

