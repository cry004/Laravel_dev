<ul class="ArticleList">
    @foreach ( $articles as $index => $article )
    <li class="Article">
        @if(!$article->is_tieup)
            <a href="{{ AppUrl::to('article-' . $article->id) }}">
        @else
            <a href="{{ AppUrl::to('tu/article-' . $article->id) }}">
        @endif
            <img src="{{ $article->eyecatch }}" class="Article-Image" alt="{{ $article->title }}" width="140">
            <div class="Article-Text">
                <h3>{{ $article->title }}</h3>
                <p class="R-Hidden">{!! nl2br(e($article->excerpt)) !!}</p>
                <div class="Article-Stats">
                    @if(!$article->is_tieup)
                        <span class="Article-View"><i class="Icon Icon-ic_view"></i>{{ k_format($article->view_amount) }}</span>
                    @else
                        <span class="Article-View">{{ $article->list_summary }}</span>
                    @endif
                    <time class="Article-Created R-Hidden">{{ article_date_format($article->post_date) }}</time>
                </div>
            </div>
            @if ( isset($badge) )
                @if ( $index + $badge === 0 )
                <span class="Article-Badge Article-Badge-Gold">{{ $index + $badge + 1 }}</span>
                @elseif ( $index + $badge === 1 )
                <span class="Article-Badge Article-Badge-Silver">{{ $index + $badge + 1 }}</span>
                @elseif ( $index + $badge === 1 )
                <span class="Article-Badge Article-Badge-Bronze">{{ $index + $badge + 1 }}</span>
                @else
                <span class="Article-Badge">{{ $index + $badge + 1 }}</span>
                @endif
            @endif
        </a>
    </li>
    @endforeach
</ul>
