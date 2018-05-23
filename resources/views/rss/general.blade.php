<?php
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<rss version="2.0">
  <channel>
    <language>ja</language>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
    @foreach($data["articles"] as $article)
      @if (!$article->is_pr)
        <item>
          <guid>{{$article->id}}</guid>
          <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
          <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
          <pubDate>
            {{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}
          </pubDate>
          <description>{!! "<![CDATA[". $article->excerpt ."]]>" !!}</description>
          <enclosure url="{{ $article->eyecatch }}"/>
        </item>
      @endif
    @endforeach
  </channel>
</rss>