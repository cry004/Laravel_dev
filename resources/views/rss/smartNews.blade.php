<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?' . '>' . PHP_EOL;
?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" xmlns:snf="http://www.smartnews.be/snf">
    <channel>
        <language>ja</language>
        <title>{{$data["siteTitle"]}}</title>
        <link>{{$data["siteUrl"]}}</link>
        <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
        <pubDate>{{ \Carbon\Carbon::now("Asia/Tokyo") }}</pubDate>
        @foreach($data["articles"] as $article)
            <item>
                <guid>{{$data["siteUrl"]."/article-{$article->id}/" }}</guid>
                <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}</pubDate>
                <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
                <link>{{$data["siteUrl"]."/article-{$article->id}" }}</link>
                <?php
                    if (!empty($article->keyword[0])){
                            echo "<category>{$article->keyword[0]->vocable->text_content}</category>";
                    }
                ?>

                <description>
                    <![CDATA[
                    {!! html_entity_decode($article->excerpt) !!}
                    ]]>
                </description>
                <content:encoded>
                    <![CDATA[
                    {!! html_entity_decode(\Hair\Services\Rss\fixRss::setFigureTag($article->content)) !!}
                    ]]>
                </content:encoded>
                <media:thumbnail>
                    {{ $article->eyecatch }}
                </media:thumbnail>
                <enclosure url="{{ $article->eyecatch }}"/>
            </item>
        @endforeach
    </channel>
</rss>