<div class="NewsStats">

    @if(!$article->is_tieup)
        <span class="NewsStats-View">
            <i class="Icon Icon-ic_view"></i>
            {{ $article->view_amount }}
        </span>
    @endif
    <div class="NewsStats-Share">
        {{--<div class="line-it-button" data-lang="ja" data-type="friend" data-lineid="@oa-hair" data-count="true" style="display: none;"></div>--}}
        <a target="_blank" href="https://www.facebook.com/share.php?u={{ rawurlencode(AppUrl::to('article-' . $article->id)) }}" class="Button Button-Facebook Button-Round"><i class="Icon Icon-ic_sns_facebook"></i>Share</a>
        <a target="_blank" href="https://twitter.com/intent/tweet?original_referer={{ rawurlencode(AppUrl::to('article-' . $article->id)) }}&amp;text={{ rawurlencode($article->title) }}&amp;url={{ rawurlencode(AppUrl::to('article-' . $article->id)) }}&amp;via=haircm" class="Button Button-Twitter Button-Round"><i class="Icon Icon-ic_sns_twitter"></i>tweet</a>
        <div class="Button-Line">
            <div class="line-it-button" data-lang="ja" data-type="friend" data-lineid="@oa-hair" data-count="true" style="display: none;" ></div>
            <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
        </div>
        {{-- @future
        <a href="#" class="Button Button-Like Button-Round js-LikeButton"><i class="Icon Icon-ic_like"></i>いいね！(999)</a>
        --}}
    </div>
</div>
