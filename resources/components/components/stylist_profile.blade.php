<input type="checkbox" class="toggle-checkbox hidden" value="1" id="toggle-profile-detail">
<section class="Content Profile js-FixHeightNode">
    <div class="Profile-Content js-ProfileContent">
        <div class="Profile-Background js-ProfileBackground" style="background-image:url('{{ $stylist->getCoverImage() }}');"></div>
        <div class="Social align-right">
            {{--
            <a class="Social-Button" href="facebook.com"><i class="Icon Icon-ic_sns_facebook"></i></a>
            <a class="Social-Button" href="twitter.com"><i class="Icon Icon-ic_sns_twitter"></i></a>
            <a class="Social-Button" href="instragram.com"><i class="Icon Icon-ic_sns_instagram"></i></a>
            --}}
        </div>
        <div class="Profile-Data">
            <img src="{{ $stylist->getIconImage() }}" alt="{{ $stylist->nickname }}" class="Profile-Image round-image" width="100">
            <div class="Profile-User">
                <h5>{{ $stylist->nickname }}{{ ( !empty($stylist->shop_name) ) ? ' | ' . $stylist->shop_name : '' }}</h5>
                <div class="Profile-Stats">
                    <p class="Profile-Stat-User">
                        <span>{{ $stylist->getTypeString() }}</span>
                        <span>{{ $stylist->areaname }}</span>
                    </p>
                    <p class="Profile-Stat-Stat">
                        <span><i class="Icon Icon-ic_like"></i>獲得いいね {{ k_format($stylist->getTotalLikedAmounts()) }}</span>
                        <span><i class="Icon Icon-ic_view"></i>ビュー {{ k_format($stylist->getTotalViewCount()) }}</span>
                    </p>
                </div>
            </div>
            <div class="Profile-Detail">
                <p class="Profile-Detail-Message">{{ $stylist->message }}</p>
                <dl class="Profile-Detail-Definitions">
                @if ( $stylist->isStylist() )
                    @if ( !empty($stylist->career) )
                    <dt>スタイリスト歴</dt><dd>{{ $stylist->career }}</dd>
                    @endif
                    <dt>サロン名</dt><dd>{{ ( !empty($stylist->shop_name) ) ? $stylist->shop_name : "-" }}</dd>
                    <dt>サロン紹介</dt><dd>{{ ( !empty($stylist->shop_description) ) ? $stylist->shop_description : "-" }}</dd>
                    <dt>住所</dt><dd>{{ ( !empty($stylist->address) ) ? $stylist->address : "-" }}</dd>
                    <dt>営業時間</dt><dd>{{ ( !empty($stylist->business_hours) ) ? $stylist->business_hours : "-" }}</dd>
                    <dt>休日</dt><dd>{{ ( !empty($stylist->holiday) ) ? $stylist->holiday : "-" }}</dd>
                    <dt>メニュー料金</dt><dd>{{ ( !empty($stylist->menu) ) ? $stylist->menu : "-" }}</dd>
                    @if ( !empty($stylist->tel) )
                    <dt>電話番号</dt><dd><span class="R-Hidden">{{ $stylist->tel }}</span><a href="tel:{{ $stylist->tel }}" class="R-Show-Inline">{{ $stylist->tel }}</a></dd>
                    @else
                    <dt>電話番号</dt><dd>-</dd>
                    @endif
                @elseif ( $stylist->isHairModel() )
                    @if ( ! empty($stylist->achivement) )
                    <dt>実績</dt><dd>{{ $stylist->achivement }}</dd>
                    @endif
                    <dt>ヘアモデル歴</dt><dd>{{ ( !empty($stylist->career) ) ? $stylist->career : "-" }}</dd>
                    <dt>ブリーチ</dt><dd>{{ ( $stylist->is_bleach > 0 ) ? "◯" : "☓" }}</dd>
                    <dt>カラー</dt><dd>{{ ( $stylist->is_color > 0 ) ? "◯" : "☓" }}</dd>
                    <dt>カット</dt><dd>{{ ( $stylist->is_cut > 0 ) ? "◯" : "☓" }}</dd>
                @endif
                </dl>
                @if ( ! empty($stylist->button_url) )
                <div class="Profile-Salon-Button align-center">
                    <a href="{{ $stylist->button_url }}" class="Button Button-Round Button-Trans Button-Padded" target="_blank">
                        @if ( $stylist->isStylist() )
                        <i class="Icon Icon-ic_desktop"></i>サロン予約<em class="normal-style">(Web)</em>
                        @elseif ( $stylist->isHairModel() )
                        <i class="Icon Icon-ic_desktop"></i>撮影依頼</em>
                        @endif
                    </a>
                </div>
                @endif
            </div>
        </div>
        <label class="Profile-Expander js-ProfileExpander" for="toggle-profile-detail"><i class="Icon Icon-ic_expand"></i></label>
    </div>
</section>
