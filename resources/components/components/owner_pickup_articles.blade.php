<!-- Heading -->
<div class="Heading section-spacing">
    <h3 class="Heading-Text">編集部ピックアップ記事</h3>
</div>
<!-- /Heading -->

@foreach ( $articles as $index => $article )
<div class="Entry">
    <a class="puArticle-0{{$index+1}}" href="{{ $article->link_url }}">
    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" width="64">
    <p class="Entry-Title">{{ $article->title }}</p>
    {{--
    <span class="Entry-View"><i class="Icon Icon-ic_view"></i>{{ k_format($article->view_amount) }}</span>
    --}}
    </a>
</div>
@endforeach

{{--
<div class="More">
    <a href="{{ AppUrl::to('news/pickups') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっとみる</a>
</div>
--}}
