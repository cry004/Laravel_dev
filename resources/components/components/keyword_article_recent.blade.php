@if ( $tagName )
<!-- Heading -->
<div class="Heading section-spacing section-start-spacing">
    <h2 class="Heading-Text">{{ $tagName->text_content }}に関する新着記事</h2>
    <span class="Heading-Sub R-Hidden">トレンドのヘアスタイル情報</span>
</div>
<!-- /Heading -->
@foreach ( $articles as $index => $article )
<div class="Entry">
    @if(!$article->is_tieup)
        <a class="newArticle-0{{$index+1}}" href="{{ $article->getDetailLinkURL() }}">
    @else
        <a class="newArticle-0{{$index+1}}" href="{{ AppUrl::to('tu/article-' . $article->id) }}">
    @endif
    <img src="{{ $article->eyecatch }}" alt="{{ $article->title }}" width="64">
    <p class="Entry-Title">{{ $article->title }}</p>
    @if(!$article->is_tieup)
        <span class="Entry-View"><i class="Icon Icon-ic_view"></i>{{ k_format($article->view_amount) }}</span>
    @else
        <span class="Entry-View">{{ $article->list_summary }}</span>
    @endif
    @if ( isset($badge) && $badge === true )
          @if ( $index === 0 )
          <span class="Entry-Badge Entry-Badge-Gold">{{ $index + 1 }}</span>
          @elseif ( $index === 1 )
          <span class="Entry-Badge Entry-Badge-Silver">{{ $index + 1 }}</span>
          @elseif ( $index === 1 )
          <span class="Entry-Badge Entry-Badge-Bronze">{{ $index + 1 }}</span>
          @else
          <span class="Entry-Badge">{{ $index + 1 }}</span>
          @endif
      @endif
     </a>
</div>
@endforeach
@if ( isset($more) && $more === true )
{{--@if ( $articlesCount > 5 )--}}
{{--<div class="More More-OffsetH section-spacing">--}}
    {{--<a href="more.html"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>--}}
{{--</div>--}}
{{--@endif--}}
@endif
@endif
