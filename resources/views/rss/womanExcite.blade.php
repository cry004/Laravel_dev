<?php
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
     xmlns:xhtml="http://www.w3.org/1999/xhtml"
>
  <channel>
    <language>ja</language>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>
    @foreach($data["excludeArticles"] as $exArticle)
      <item>
        <guid>{{$exArticle->id}}</guid>
        <title>{!! "<![CDATA[". $exArticle->title ."]]>" !!}</title>
        <link>{{$data["siteUrl"]."/article-{$exArticle->id}/?utm_source=womanexcite&utm_medium=referral&utm_campaign=womanexcite" }}</link>
        <pubDate>
          {{\Carbon\Carbon::parse($exArticle->post_date)->format('D, d M Y H:i:s +0900')}}
        </pubDate>
        <description>
          <![CDATA[
          {!! html_entity_decode($exArticle->excerpt) !!}
          ]]>
        </description>
        <content:encoded>
          <![CDATA[
          {!!
           html_entity_decode(
            \Hair\Services\Rss\fixRss::setFigureTag(
              \Hair\Services\Rss\fixRss::cutStylistImageWidth(
                \Hair\Services\Rss\fixRss::removeTags(
                  \Hair\Services\Rss\fixRss::removeATag($exArticle->content)
                  )
              )
            )
          )
           !!}
          ]]>
        </content:encoded>
        <status>9</status>
        <enclosure url="{{ $exArticle->eyecatch }}"/>
        @if (!empty($exArticle->keyword[0]))
          <category>{{$exArticle->keyword[0]->vocable->text_content}}</category>
        @endif
      </item>
    @endforeach
    @foreach($data["articles"] as $article)
    <item>
      <guid>{{$article->id}}</guid>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/?utm_source=womanexcite&utm_medium=referral&utm_campaign=womanexcite" }}</link>
      <pubDate>
        {{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s +0900')}}
      </pubDate>
      <description>
        <![CDATA[
        {!! html_entity_decode($article->excerpt) !!}
        ]]>
      </description>
      <content:encoded>
        <![CDATA[
        {!!
         html_entity_decode(
          \Hair\Services\Rss\fixRss::setFigureTag(
            \Hair\Services\Rss\fixRss::cutStylistImageWidth(
              \Hair\Services\Rss\fixRss::removeTags(
                \Hair\Services\Rss\fixRss::removeATag($article->content)
                )
            )
          )
        )
         !!}
        ]]>
      </content:encoded>
      <status>0</status>
      <enclosure url="{{ $article->eyecatch }}"/>
        @if (!empty($article->keyword[0]))
          <category>{{$article->keyword[0]->vocable->text_content}}</category>
        @endif
      @foreach($data["relatedArticles"] as $relatedArticle)
        <internal_link>
          <title>
            {!! $relatedArticle->title !!}
          </title>
          <link>
            {!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."/?utm_source=womanexcite&utm_medium=referral&utm_campaign=womanexcite") !!}
          </link>
        </internal_link>
      @endforeach
    </item>
    @endforeach
  </channel>
</rss>