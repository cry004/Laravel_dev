<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;

?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:mery="http://mery.jp/rss/partner">
  <channel>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>

    <pubDate>Thu, 15 May 2014 00:00:00 +0900</pubDate>
    <image>
      <url>https://s3-ap-northeast-1.amazonaws.com/prod-hair/logos/HAIR+Logo+200x200.png</url>
      <title>{{$data["siteTitle"]}}</title>
      <link>{{$data["siteUrl"]}}</link>
    </image>

    @foreach($data["articles"] as $article)
    <item>
      <guid>{{$data["siteUrl"]."/article-{$article->id}/" }}</guid>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>

      <description>{!! "<![CDATA[". $article->excerpt ."]]>" !!}</description>
      <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}</pubDate>

      <content:encoded><![CDATA[
        {!!
          \Hair\Services\Rss\fixRss::setFigureTag(
            \Hair\Services\Rss\fixRss::cutStylistImage($article->content)
            )

        !!}
        ]]></content:encoded>
      <media:thumbnail>
        {{ $article->eyecatch }}
      </media:thumbnail>
      @foreach($data["relatedArticles"] as $relatedArticle)
        <mery:relatedLink title="{!! $relatedArticle->title !!}" thumbnail="{{$relatedArticle->eyecatch}}" link="{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."?utm_source=mery&utm_medium=referral&utm_campaign=mery") !!}" />
      @endforeach
    </item>
    @endforeach
  </channel>
</rss>
