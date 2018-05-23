<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?' . '>' . PHP_EOL;
?>

<rss version="2.0">
    <channel>
        <title>{{$data["siteTitle"]}}</title>
        <link>{{$data["siteUrl"]}}</link>
        <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
        
        @foreach($data["articles"] as $article)
            <item>
                <guid>{{$article->id}}</guid>
                <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
                <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
                <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s')}}</pubDate>
                <category>1</category>
                <description><![CDATA[
                    <summary>
                        {!! $article->excerpt !!}
                    </summary>
                    <article>
                        {!! $article->excerpt !!}
                        <br/>
                        {!! html_entity_decode(\Hair\Services\Rss\yahoobeauty::formatText($article->content)) !!}
                        <br/>
                        <br/>
                    </article>
                    ]]>
                </description>

                <enclosure url="{{ $article->eyecatch }}"/>
                @foreach($data["relatedArticles"] as $relatedArticle)
                    <related>
                        <title>
                            {!! $relatedArticle->title !!}
                        </title>
                        <url>
                            {!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."/?utm_source=joshiplus&utm_medium=referral&utm_campaign=joshiplus") !!}
                        </url>
                    </related>
                @endforeach
            </item>
        @endforeach
    </channel>
</rss>
