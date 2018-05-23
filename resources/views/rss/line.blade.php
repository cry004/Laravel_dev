<?php
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>

<rss version="2.0" xmlns:oa="http://news.line.me/rss/1.0/oa">
  <channel>
    <language>ja</language>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
    <lastBuildDate>{{date(DATE_RFC2822)}}</lastBuildDate>

    @foreach($data["articles"] as $article)
    <item>
      <guid>{!! "https://tiful.jp/stylist/column/{$article->id}/?utm_source=line_account_media&amp;utm_medium=mediaaliance&amp;utm_campaign=line_" !!}</guid>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-".$article->id."/?utm_source=line_account_media&amp;utm_medium=mediaaliance&amp;utm_campaign=line_"}}</link>
      <description>
        <![CDATA[
          {!! html_entity_decode(($article->content)) !!}
        ]]>
      </description>


      <enclosure url="{{ $article->eyecatch }}"/>
      <pubDate>{!! \Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0000') !!}</pubDate>
      <oa:lastPubDate>{!! \Carbon\Carbon::parse($article->updated_at)->format('D, d M Y H:i:s +0000') !!}</oa:lastPubDate>
      @foreach($data["relatedArticles"] as $relatedArticle)
        <oa:reflink>
          <refTitle><![CDATA[{!! $relatedArticle->title !!}]]></refTitle>
          <refUrl>{{$data["siteUrl"]."/article-".$relatedArticle->id."/?utm_source=line_account_media&amp;utm_medium=mediaaliance&amp;utm_campaign=line_"}}</refUrl>

        </oa:reflink>
      @endforeach

    </item>
    @endforeach
  </channel>
</rss>