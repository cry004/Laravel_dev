@extends('global')

@section('contents')

@include("components.breadcrumb")

<div class="Content Grid Grid2-1 section-spacing">
    <div class="Grid-Content">
        <header class="NewsMeta">
            <time>{{ (new \DateTime($article->post_date))->format("Y.m.d") }}</time>
            <span class="" style="clear:both;display: block;color: #85878e; margin-top:15px">{{ nl2br(e($article->title_summary)) }}</span>
            <h1 class="NewsMeta-Title">{{ $pageMeta->getHeading() }}</h1>
            <p class="NewsMeta-Description">{!! nl2br(e($article->excerpt)) !!}</p>
        </header>

        @include("components.article_stats", ["article" => $article])

        <article class="NewsDetail">
            {!! article_format($article->content) !!}
        </article>

        @include("components.article_stats", ["article" => $article])

    </div>
    <div class="Grid-Content">
        @include("components.stylist_recommends", ["stylists" => $article->getStylistsInContent(),"isTieup"=>$article->is_tieup])
    </div>
</div>

<hr class="section-border" />
@endsection
