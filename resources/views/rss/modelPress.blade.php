<?php
date_default_timezone_set('Asia/tokyo');

echo '<?xml version="1.0" encoding="UTF-8"?'.'>'.PHP_EOL;
?>
<rss xmlns:at="http://mdpr.jp/article/rss/2.0/" version="2.0">
  <channel>
    <title>{{$data["siteTitle"]}}</title>
    <link>{{$data["siteUrl"]}}</link>
    <description>{!! "<![CDATA[".$data["siteDescription"]."]]>" !!}</description>

    <copyright>Copyright, ヘアスタイルスナップHAIR</copyright>

    @foreach($data["articles"] as $article)
    <item>
      <guid isPermaLink="false">{{$article->id}}</guid>
      <at:status>create</at:status>
      <pubDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s')}}</pubDate>
      <at:lastBuildDate>{{\Carbon\Carbon::parse($article->post_date)->format('D, d M Y H:i:s')}}</at:lastBuildDate>
      <title>{!! "<![CDATA[". $article->title ."]]>" !!}</title>
      <link>{{$data["siteUrl"]."/article-{$article->id}/" }}</link>
      <at:categoryCode>50</at:categoryCode>
      <category>美容</category>
      <description>
	<![CDATA[
		 {!! html_entity_decode($article->excerpt) !!}
		 <br/>
        {!!
        html_entity_decode(
            \Hair\Services\Rss\modelpress::formatText(
                $article->content
            )
        )
        !!}
        <p>当社では、他社・他媒体からの無断転用などを防ぐため、及び、
          記事内の画像の無許可使用を防ぐため、すべての記事に対して
          編集部で厳重なる検査を行っており、これらの検査の完了を
          確認した後、記事を掲載しております。</p>
	]]>
      </description>

      <at:lead><![CDATA[{!! $article->excerpt !!}]]></at:lead>

      <enclosure url="{{ $article->eyecatch }}"/>

      <at:appendix url="{{$data["siteUrl"]."/article-".$article->id}}" />
      <?php
            for ($i = ($data["relatedArticles"]->count() -2); $i--; $i<=0){
              $data["relatedArticles"]->pop();
            }
      ?>
      @foreach($data["relatedArticles"] as $relatedArticle)
        <at:relatedLink caption="{!! $relatedArticle->title !!}" url="{!! \Hair\Services\Rss\fixRss::xml_entities($data["siteUrl"]."/article-".$relatedArticle->id."?utm_source=modelpress&utm_medium=referral&utm_campaign=modelpress") !!}" thumbnail="{{$relatedArticle->eyecatch}}" />
      @endforeach
    </item>
    @endforeach
  </channel>
</rss>