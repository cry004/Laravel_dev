@extends('global')

@section('extra_javascripts')
{{--<script src="{{ AppUrl::asset('js/remix.js') }}"></script>--}}
{{--<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>--}}
@endsection

@section('extra_global')
	@include("components.article_like_list",["users" => $article->getRecommendStylist($limit = -1)])
@endsection

@section('contents')

@include("components.breadcrumb")

<div class="Content Grid Grid2-1 section-spacing">
	<div class="Grid-Content">
		<header class="NewsMeta">
			<time>{{ (new \DateTime($article->post_date))->format("Y.m.d") }}</time>
			<a href="{{ AppUrl::to('tag/' . $article->keyword_id) }}" class="NewsMeta-Tag R-Hidden">{{ $article->text_content }}</a>
			<h1 class="NewsMeta-Title">{{ $pageMeta->getHeading() }}</h1>
			<p class="NewsMeta-Description">{!! nl2br(e($article->excerpt)) !!}</p>
		</header>

		@include("components.article_stats", ["article" => $article])

		@include("components.article_like",["users" => $article->getRecommendStylist($limit = 7)])

		<article class="NewsDetail">
			{!! article_format($article->content) !!}
		</article>

		@include("components.article_stats", ["article" => $article])

		<div class="Heading section-start-spacing">
			<h2 class="Heading-Text">関連記事</h2>
		</div>

		<div class="section-spacing">
			@include("components.related_article_list", ["articles" => $relatedArticles])
		</div>

		<div class="Heading R-Hidden">
			<h3 class="Heading-Text">カテゴリ</h3>
		</div>

		<div class="Grid Grid-Small Grid3 section-spacing R-Hidden">
			@include("components.category")
		</div>

		@include("banners.voce")

	</div>
	<div class="Grid-Content">
		@include("components.stylist_recommends", ["stylists" => $article->getStylistsInContent(), "isTieup"=>$article->is_tieup])
		@include("components.owner_pickup_articles")
		@include("components.keyword_article_ranking", ["currentKeywordId" => $article->keyword_id, "more" => false])
		@include("components.keyword_article_recent",  ["currentKeywordId" => $article->keyword_id, "more" => false])
		@include("banners.line")
		@include("components.facebook_timeline")
	</div>
</div>

<hr class="section-border" />
@endsection
