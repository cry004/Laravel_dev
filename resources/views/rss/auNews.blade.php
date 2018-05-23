<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>

<rss version="2.0"  xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:relate="http://example.jp/" >
  <channel>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>

    @foreach($data["articles"] as $article)
    <item>
      <categoryId>10</categoryId>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
      <description><![CDATA[
        <article>
          {!! $article->excerpt !!}
          <br/>
          {!! html_entity_decode(\Hair\Services\Rss\au::formatText($article->content)) !!}
          <br/>
        </article>
        ]]>
      </description>
      <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s')}}</pubDate>

      @foreach($data["relatedArticles"] as $relatedArticle)
        <relate:link title="{!! $relatedArticle->title !!}" href="{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."?utm_source=mery&utm_medium=referral&utm_campaign=mery") !!}"></relate:link>
      @endforeach
    </item>
    @endforeach
  </channel>
</rss>
