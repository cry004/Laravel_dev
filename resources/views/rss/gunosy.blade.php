<?php
use Hair\Services\Rss\fixRss;
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:gnf="http://assets.gunosy.com/media/gnf">
  <channel>
    <language>ja</language>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
    <ttl>30</ttl>

    <image>
      <url>https://s3-ap-northeast-1.amazonaws.com/prod-hair/logos/HAIR+Logo+200x200.png</url>
      <title>HAIR</title>
      <link>https://hair.cm/</link>
    </image>

    @foreach($data["articles"] as $article)
    <item>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
      <gnf:category>column</gnf:category>
      <description>{!! "<![CDATA[". $article->excerpt ."]]>" !!}</description>
      <content:encoded><![CDATA[
        {!!
        html_entity_decode(
          \Hair\Services\Rss\fixRss::setFigureTag(
            \Hair\Services\Rss\fixRss::cutStylistImageWidth(
              \Hair\Services\Rss\fixRss::cutStylistImage($article->content)
            )
          )
        )
        !!}
        ]]></content:encoded>
      <media:status state="active" />
      <enclosure url="{{ $article->eyecatch }}"/>
      <pubDate>{!! \Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900') !!}</pubDate>
      <gnf:modified>{!! \Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900') !!}</gnf:modified>
      @foreach($data["relatedArticles"] as $relatedArticle)
        <gnf:relatedLink title="{!! $relatedArticle->title !!}" link="{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."?utm_source=gunosy&utm_medium=referral&utm_campaign=gunosy") !!}" thumbnail="{{$relatedArticle->eyecatch}}" />
      @endforeach

    </item>
    @endforeach
  </channel>
</rss>