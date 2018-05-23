<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?' . '>' . PHP_EOL;
?>

<rss version="2.0">
    <channel>
        <language>ja</language>
        <title>{{$data["siteTitle"]}}</title>
        <link>{{$data["siteUrl"]}}</link>
        <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
        @foreach($data["articles"] as $article)
            <item>
                <guid>{{$article->id}}</guid>
                <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}</pubDate>
                <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
                <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
                <?php
                    /*$cateArrStg = [
                            995     => 1, //hair style
                            1004    => 1, //HAIRISTA
                            1019    => 1, //cosme
                            1016    => 1, //nail
                            1017    => 3, //fashion
                            1015    => 5, //Love
                    ];*/
                    $cateArrProd = [
                            2906     => 1, //hair style
                            9866     => 1, //HAIRISTA
                            9867     => 1, //cosme
                            1926     => 1, //nail
                            761      => 3, //fashion
                            9865     => 4, //Love
                    ];
                    $categoryId = 1;
                    if (!empty($article->keyword[0])){
                        if (array_key_exists($article->keyword[0]->vocableset_id, $cateArrProd)){
                            $categoryId = $cateArrProd[$article->keyword[0]->vocableset_id];
                        }
                    }
                ?>
                <category>{{$categoryId}}</category>
                <description><![CDATA[
                    <summary>
                       {!! html_entity_decode($article->excerpt) !!}
                    </summary>
                    <article>
                        {!! html_entity_decode($article->excerpt) !!}
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
                            {!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."/?utm_source=yahooBeauty&utm_medium=referral&utm_campaign=yahooBeauty") !!}
                        </url>
                    </related>
                @endforeach
            </item>
        @endforeach
    </channel>
</rss>