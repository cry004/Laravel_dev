<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?' . '>' . PHP_EOL;
?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
    <channel>
        <language>ja</language>
        <title>{{$data["siteTitle"]}}</title>
        <link>{{$data["siteUrl"]}}</link>
        <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>

        @foreach($data["articles"] as $article)

            <item>
                <description>{!! "<![CDATA[".$article->excerpt."]]>" !!}</description>
                <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
                <link>{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-{$article->id}/"."?utm_source=couples&utm_medium=referral&utm_campaign=couples") !!}</link>
                <pubDate>{!! \Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900') !!}</pubDate>
                <lastpubDate>{!! \Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900') !!}</lastpubDate>
            </item>
        @endforeach
    </channel>
</rss>
