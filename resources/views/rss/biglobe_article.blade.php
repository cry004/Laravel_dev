<?php
date_default_timezone_set('Asia/tokyo');
echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<news>
    <author>
        <name>HAIR</name>
        <uri>https://hair.cm/article-{{$article->id}}</uri>
    </author>
    <entry>
        <type>10</type>
        <id>{{$article->id}}</id>
        <title><![CDATA[{{ $article->title }}]]></title>
        <description><![CDATA[{!! html_entity_decode(
              \Hair\Services\Rss\fixRss::setFigureTag(
                \Hair\Services\Rss\fixRss::cutStylistImageWidth(
                  \Hair\Services\Rss\fixRss::removeTags(
                    \Hair\Services\Rss\fixRss::removeATag(
                    \Hair\Services\Rss\fixRss::cutStylistImage($article->content))
                  )
                )
              )
             )
             !!}]]></description>
        <published>{!! \Carbon\Carbon::parse($article->post_date)->format("Y-m-d\\TH:i:sP") !!}</published>
        <updated>{!! \Carbon\Carbon::parse($article->post_date)->format("Y-m-d\\TH:i:sP") !!}</updated>
        <category term="トレンド/{{$article->text_content}}" />
        @foreach($images as $image)
            <image>
                <path>{{$image}}</path>
                <caption></caption>
            </image>
        @endforeach
            @foreach($relatedArticles as $relatedArticle)
            <relationlink>
                <title>{!! $relatedArticle->title !!}</title>
                <href>https://hair.cm/article-{{$relatedArticle->id}}</href>
            </relationlink>
            @endforeach
    </entry>
</news>