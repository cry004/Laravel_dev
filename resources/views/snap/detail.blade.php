@extends("global")

@section("extra_javascripts")
<script src="{{ AppUrl::asset('js/snap-profile.js') }}"></script>
@endsection

@section("contents")

@include("components.breadcrumb")

<div class="Content">
    <div class="Heading section-spacing R=AlignCenter Heading-NoBorder Heading-NoMargin">
        <h1 class="Heading-Text">{{ $pageMeta->getHeading() }}</h1>
    </div>

    <figure class="Snap section-spacing">
        <div class="Snap-Image">
            <img src="{{ $photograph->getFilePath('zoom') }}" alt="{{ $photograph->caption }}" class="image-max">
            <div class="Snap-Stats">
                <span class="Snap-Likes"><i class="Icon Icon-ic_like"></i>{{ k_format($photograph->like_amount) }}</span>
                <span class="Snap-Views"><i class="Icon Icon-ic_view"></i>{{ k_format($photograph->views) }}</span>
                <div class="Snap-Share js-ShareToggle">
                    <i class="Icon Icon-ic_share"></i>
                    <ul class="ShareList js-ShareList">
                        <li class="ShareList-Item ShareList-Item--facebook">
                            <a target="_blank" href="http://www.facebook.com/share.php?u={{ rawurlencode($photograph->getPhotographURL()) }}"><i class="Icon Icon-ic_sns_facebook"></i>facebook</a>
                        </li>
                        <li class="ShareList-Item ShareList-Item--twitter">
                            <a target="_blank" href="https://twitter.com/intent/tweet?original_referer={{ rawurlencode($photograph->getPhotographURL()) }}&amp;text={{ rawurlencode($photograph->nickname . 'さんのスナップ') }}&amp;url={{ rawurlencode($photograph->getPhotographURL()) }}&amp;via=haircm"><i class="Icon Icon-ic_sns_twitter"></i>twitter</a>
                        </li>
                        <li class="ShareList-Item ShareList-Item--pinterest">
                            <a target="_blank" href="//pinterest.com/pin/create/link/?url={{ rawurlencode($photograph->getPhotographURL()) }}&media={{ rawurlencode($photograph->getFilePath()) }}&description={{ rawurlencode($photograph->nickname . 'さんのスナップ') }}">
                                <i class="Icon Icon-ic_sns_pinterest">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                pinterest
                            </a>
                        </li>
                        <li class="ShareList-Item ShareList-Item--googleplus">
                            <a target="_blank" href="https://plus.google.com/share?url={{ rawurlencode($photograph->getPhotographURL()) }}">
                                <i class="Icon Icon-ic_sns_google_plus">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                google+
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <figcaption class="Snap-Info">
            <div class="Snap-Section">
                <a href="{{ $user->getProfileURL() }}">
                    <img src="{{ $user->getIconImage() }}" width="64" class="Snap-Avatar round-image">
                </a>
                <div class="Snap-Author">
                    <a href="{{ $user->getProfileURL() }}">
                    <h3 class="Snap-Author-Name text-ellipsis">{{ $user->nickname }}<span class="R-Show-Inline">{{ ( ! empty($user->shop_name) ) ? '/ ' . $user->shop_name : "" }}</span></h3>
                    <small class="Snap-Author-Type R-Hidden">{{ $user->getTypeString() }}</small>
                    <span class="Snap-Author-Place R-Hidden">{{ $user->areaname }}</span>
                    </a>
                </div>
                @if ( !empty($user->shop_name) )
                <div class="Snap-Author-Salon top-border align-center R-Hidden">
                    @if ( !empty($user->button_url) )
                    <a href="{{ $user->button_url }}" target="_blank">{{ $user->shop_name }}</a>
                    @else
                    <span>{{ $user->shop_name }}</span>
                    @endif
                </div>
                @endif
            </div>
            <div class="Snap-Section">
                <time class="Snap-Time">{{ $photograph->getRelativeTime() }}</span>
                <p class="Snap-Description buttom-border">
                    {!! nl2br(e($photograph->caption)) !!}
                </p>

                <div class="Heading R-Show Heading-NoBorder">
                    <h4 class="Heading-Text">関連するキーワード</h4>
                </div>

                <input type="checkbox" value="1" id="accordion00" class="hidden">
                <section class="Content-Overflow section-spacing" data-count="{{ count($keywords) }}">
                    @foreach ( $keywords as $keyword )
                    <div class="TextLabel">
                        <a href="{{ AppUrl::to('tag/' . $keyword->keyword_id . '/snap') }}">{{ $keyword->tagname }}</a>
                    </div>
                    @endforeach
                </section>
                @if ( count($keywords) > 5 )
                <div class="Content-Overflow-Toggle R-Show">
                    <label for="accordion00">すべて見る<i class="Icon Icon-ic_keyboard_arrow"></i></label>
                </div>
                @endif
            </div>
        </figcaption>
    </figure>

    @if ( count($snaps) > 0 )
    <div class="Heading">
        <h4 class="Heading-Text Heading-Text-Small">{{ $user->nickname }}さんの人気のヘアスナップ</h4>
    </div>

    <div class="Grid Grid4">
        @foreach ( $snaps as $snap )
        <div class="Card Card-Overlay">
            <a href="{{ $snap->getPhotographURL() }}">
                <img src="{{ $snap->getFilePath() }}" alt="" class="image-max">
                <div class="Card-Stats">
                    <span class="Card-Stat Card-Stat--like"><i class="Icon Icon-ic_like"></i>{{ $snap->like_amount }}</span>
                    <span class="Card-Stat Card-Stat--view"><i class="Icon Icon-ic_view"></i>{{ $snap->views }}</span>
                </div>
           </a>
        </div>
        @endforeach
    </div>
    @if ( $snapTotal > 8 )
    <div class="More More-OffsetH">
        <a href="{{ $user->getProfileURL('snap') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
    </div>
    @endif
    @endif

    @if ( $user->isStylist() || $user->isHairModel() )
    @if ( $user->isStylist() )
    <div class="Heading R-Hidden">
        <h4 class="Heading-Text Heading-Text-Small">{{ $user->nickname }}さんのサロンに足を運んでみませんか？</h4>
    </div>
    @endif
    <input type="checkbox" class="toggle-checkbox hidden" value="1" id="toggle-profile-detail">
    <section class="Profile Profile-Inner">
        <div class="Profile-Content js-ProfileContent">
        <div class="Profile-Background js-ProfileBackground" style="background-image:url('{{ $user->getCoverImage() }}')"></div>
            <div class="Profile-Data js-FixedHeight">
                <a href="{{ $user->getProfileURL() }}">
                    <img src="{{ $user->getIconImage() }}" alt="{{ $user->nickname }}" class="Profile-Image round-image" width="100">
                </a>
                <div class="Profile-User">
                    <a href="{{ $user->getProfileURL() }}">
                    @if ( $user->isStylist() )
                        <div class="Profile-User-Prefix">{{ $user->nickname }}さんのヘアサロン</div>
                        @if ( ! empty($user->shop_name) )
                        <h5>{{ $user->shop_name }}</h5>
                        @endif
                    @else
                        <div class="Profile-User-Prefix">{{ $user->nickname }}さん</div>
                        @if ( ! empty($user->arename) )
                        <h5>{{ $user->areaname }}</h5>
                        @endif
                    @endif
                    </a>
                </div>
            </div>
            <p class="Profile-Message js-FixedHeight">{{ $user->message }}</p>
            <div class="Profile-Detail">
                <dl class="Profile-Detail-Definitions">
                @if ( $user->isStylist() )
                    @if ( !empty($user->career) )
                    <dt>スタイリスト歴</dt><dd>{{ $user->career }}</dd>
                    @endif
                    <dt>サロン名</dt><dd>{{ ( !empty($user->shop_name) ) ? $user->shop_name : "-" }}</dd>
                    <dt>サロン紹介</dt><dd>{{ ( !empty($user->shop_description) ) ? $user->shop_description : "-" }}</dd>
                    <dt>住所</dt><dd>{{ ( !empty($user->address) ) ? $user->address : "-" }}</dd>
                    <dt>営業時間</dt><dd>{{ ( !empty($user->business_hours) ) ? $user->business_hours : "-" }}</dd>
                    <dt>休日</dt><dd>{{ ( !empty($user->holiday) ) ? $user->holiday : "-" }}</dd>
                    <dt>メニュー料金</dt><dd>{{ ( !empty($user->menu) ) ? $user->menu : "-" }}</dd>
                    @if ( !empty($user->tel) )
                    <dt>電話番号</dt><dd><span class="R-Hidden">{{ $user->tel }}</span><a href="tel:{{ $user->tel }}" class="R-Show-Inline">{{ $user->tel }}</a></dd>
                    @else
                    <dt>電話番号</dt><dd>-</dd>
                    @endif
                @elseif ( $user->isHairModel() )
                    @if ( !empty($user->achivement) )
                    <dt>実績</dt><dd>{{ $user->achivement }}</dd>
                    @endif
                    <dt>ヘアモデル歴</dt><dd>{{ ( !empty($user->career) ) ? $user->career : "-" }}</dd>
                    <dt>ブリーチ</dt><dd>{{ ( $user->is_bleach > 0 ) ? "◯" : "☓" }}</dd>
                    <dt>カラー</dt><dd>{{ ( $user->is_color > 0 ) ? "◯" : "☓" }}</dd>
                    <dt>カット</dt><dd>{{ ( $user->is_cut > 0 ) ? "◯" : "☓" }}</dd>
                @endif
                </dl>
            </div>
            <div class="Profile-Salon-Button align-center">
                @if ( !empty($user->button_url) )
                <a target="_blank" href="{{ $user->button_url }}" class="Button Button-Round Button-Trans Button-Padded">
                @if ( $user->isStylist() )
                    <i class="Icon Icon-ic_desktop"></i>サロン予約<em class="normal-style">(Web)</em>
                @elseif ( $user->isHairModel() )
                    <i class="Icon Icon-ic_desktop"></i>撮影依頼</em>
                @endif
                </a>
                @endif
            </div>
             <div class="Content-Overflow-Toggle R-Show">
                 <label for="toggle-profile-detail" class="js-Toggle">すべて見る<i class="Icon Icon-ic_keyboard_arrow"></i></label>
             </div>
        </div>
        <label class="Profile-Expander R-Hidden js-ProfileExpander" for="toggle-profile-detail"><i class="Icon Icon-ic_expand"></i></label>
    </section>
    @endif

    <div class="Heading section-start-spacing">
        <h4 class="Heading-Text Heading-Text-Small">新着記事</h4>
    </div>
    @include("components.article_list", ["articles" => $articles])
    <div class="More section-spacing">
        <a href="{{ AppUrl::to('news') }}"><i class="Icon Icon-ic_keyboard_arrow"></i> もっと見る</a>
    </div>
</div>

@include("banners.app",  ["rshow" => true])
@include("banners.line")

<hr class="section-border" />
@endsection
