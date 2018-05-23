<!-- Heading -->
<div class="Heading section-spacing section-start-spacing">
    <h2 class="Heading-Text">記事人気ランキング</h2>
    <span class="Heading-Sub R-Hidden">今もっとも読まれている記事</span>
</div>
<!-- /Heading -->

@foreach ( $articles as $index => $article )
<div class="Entry">
    <a href="{{ $article->getDetailLinkURL() }}">
    <img src="{{ $article->eyecatch }}" alt="{{ $article->title }}" width="64">
    <p class="Entry-Title">{{ $article->title }}</p>
    <span class="Entry-View"><i class="Icon Icon-ic_view"></i>{{ k_format($article->view_amount) }}</span>
    </a>
</div>
@endforeach
