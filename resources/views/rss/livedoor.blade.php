<?php
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<rss version="2.0" xmlns:ldnfeed="http://news.livedoor.com/ldnfeed/1.1" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <language>ja</language>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>

    @foreach($data["articles"] as $article)
    <item>
      <guid>{{$article->id}}</guid>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
      <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}</pubDate>
      <lastpubDate>
        {{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}
      </lastpubDate>
      <status>1</status>
      <description>
        <![CDATA[
        {!!
         Hair\Services\Rss\fixRss::xml_entities(
          $article->content
        )
         !!}
        ]]>
      </description>
      <category>HAIR COLUMN</category>
      @foreach($data["relatedArticles"] as $relatedArticle)
      <ldnfeed:rel>
        <ldnfeed:rel_subject>{!! "<![CDATA[". $relatedArticle->title ."]]>" !!}</ldnfeed:rel_subject>
        <ldnfeed:rel_link>{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."/?utm_source=livedoornews&utm_medium=referral&utm_campaign=livedoornews") !!}</ldnfeed:rel_link>
      </ldnfeed:rel>
      @endforeach
    </item>
    @endforeach
  </channel>
</rss>