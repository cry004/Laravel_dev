<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <title><?php // echo $this->escape($this->viewTitle);?></title>
    <meta name="description" content="<?php // echo $this->escape($this->viewDescription);?>" />
    <meta name="keywords" content="<?php // echo $this->escape($this->viewKeywords);?>" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="256x256">
    <link rel="shortcut icon" href="/images/favicon.ico" />

    <meta property="og:title" content="<?php // echo $this->escape($this->data['nickname'])  ?> - HAIR about ME" />
    <meta property="og:description" content="自分を発信し続けたい。おしゃれでクールで今までになかった、わたしだけのスタイルブック。" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://hair.cm/about/<?php // echo $this->escape($this->data['username']) ?>" />
    <meta property="og:image" content="<?php // echo $this->escape($this->data['cover_img']) ?>" />
    <meta name="twitter:site" content="@haircm" />
    <meta name="twitter:domain" content="hair.cm" />
    <meta name="twitter:description" content="<?php // echo $this->escape($this->captionForOgp); ?>" />
    <meta name="twitter:app:country" content="JP" />
    <meta name="twitter:app:name:iphone" content="ヘアスタイルスナップ HAIR" />
    <meta name="twitter:app:id:iphone" content="836755631" />
    <meta name="twitter:app:name:ipad" content="ヘアスタイルスナップ HAIR" />
    <meta name="twitter:app:id:ipad" content="836755631" />
    <meta name="twitter:app:name:googleplay" content="HAIR - ヘアスタイル - ファッション・スナップ" />
    <meta name="twitter:app:id:googleplay" content="jp.co.rich.android.hair" />
    <meta name="twitter:app:url:googleplay" content="https://play.google.com/store/apps/details?id=jp.co.rich.android.hair" />
    <meta name="twitter:card" content="photo" />
    <meta name="X-User-ID" content="<?php // echo $this->escape($this->data["user_id"]);?>" />
    <link rel="stylesheet" type="text/css" href="https://hair.cm/about/css/aboutme-app.css">
    <link rel="alternate" href="android-app://jp.co.rich.android.hair/cm.hair/user/open?user_id=<?php // echo $this->escape($this->data["user_id"]);?>" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-49269730-3', 'hair.cm');
        ga('send', 'pageview');
    </script>
</head>
<body>
<?php // require_once(APPLICATION_PATH.'/../../common/utils/GoogleTagManager.php') ?>
<?php // if ( $this->is_mobile ):?>
<div class="dl-banner">
    <?php // if ( strpos($this->agent, "android") !== FALSE ):?>
    <a href="/r/app_download?source=user_aboutme" class="aboutme-bunner" onmousedown="ga('send','event','aboutme','googleplay')">
        <img src="/about/images/aboutme_bunner.png">
    </a>
    <?php // else:?>
    <a href="/r/app_download?source=user_aboutme" class="aboutme-bunner" onmousedown="ga('send','event','aboutme','appstore')">
        <img src="/about/images/aboutme_bunner.png">
    </a>
    <?php // endif;?>
    <div class="dl-banner-remove"></div>
</div>
<?php // endif;?>
<div class="header">
    <a href="/about" onMouseDown="ga('send','event','aboutme','logo')"><img src="/about/images/aboutme_logo.png" id="top-logo" height="30" /></a>
</div>
<div class="Page">
    <div class="Page-Background" data-background={{$userData->cover_img}}>
        <?php // if ( ! empty($this->data["icon_img"]) ):?>
        <div class="User-Icon">
            <img src={{$userData->icon_img}} class="User-Icon-Image" alt={{$userData->nickname}} id="js-IconImage">
        </div>
        <?php // endif;?>
        <?php // if ( !empty($this->data["username"]) ):?>
            <?php // $share_url = 'https://hair.cm/about/'.$this->data['username']; ?>
            <?php // else:?>
            <?php // $share_url = 'https://hair.cm/about/user/'.$this->data['user_id']; ?>
            <?php // endif;?>
        <?php // $share_desc = urlencode("HAIR about ME - ". $this->escape($this->data['nickname'])."'s HAIR STYLE LOG | ".$share_url); ?>
        <div class="User-Socials">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php // echo $this->escape($share_url) ?>" target="_blank">
                <img width="32" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFgAAABYCAMAAABGS8AGAAAAgVBMVEVMaXH///9Pd7NagLhOd7JPd7NNeLFOdrJNdrNVf6q0xd/+/v9QeLPN2OlvkMFrjL+yxN79/f6OqM7Z4u/M2Ony9flpi76wwt3Q2+uasdOKpMzS3OxQeLTAzuT1+Pvx9PmTq9BkiLzl6/SbstRliL3z9fqlutjX4O74+vxfg7qMps3MqSc+AAAACnRSTlMA////+tQk2XkMHK0DUQAAANhJREFUeAHt2VVCxFAMRuGk7jiMu+9/f6MM/kYOmrOA76ly219E8iyOAsOiOMtlX5IG5qWJSJ4GQGkuWYCUSczAsUQMHEkAhcIOO+yww1V4zhAOp62hPmUHb+Z7DoDbqgjcXEHwrTLwuoTgjkLwgoIvKbig4L6eq+9Nb+laz81sH0I3ei60hScUfEfBpT2sHzeg4C4FP1DwNQVfQPCqB8HLAIILCh5RcPN5ODymT43DQ5XVs0LfPyscdthhhx122GEihx122OHvhbERC5vdsKEQmzaxMZaaj3ch2z4j2AKVSwAAAABJRU5ErkJggg==" class="sns-btn" onMouseDown="ga('send','event','aboutme','fb')">
            </a>
            <a href="https://twitter.com/intent/tweet?text=<?php // echo $this->escape($share_desc) ?>" target="_blank">
                <img width="32" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFgAAABYCAMAAABGS8AGAAAAaVBMVEVMaXH///9NndtjqeBVlNRNndpNm9tMndpMndtNm9tYo92mzu16tuSQwun0+f3d7fhvr+L1+f292vLe7fjT5/bp8/q82vGFvOabyOux1O/S5vbp8/uy1O/I4fSPwujH4PSayOt5teSEu+b7RGONAAAACnRSTlMA////DNkk1Pp5H+/gjAAAAcdJREFUeAHszEkVwEAUAjAef/dvuBUx3IiAAMib5UM7l/h18blqIIsClThKHIYSg6XEgiKOHTt27Fgef+3ZBXIeMRCE0eqeQtEymn3/O8Yhs5S0fijc7wBvGcf8CGDow2Vh6/Ha8EqvUYRtYanQ4UOepPkOJsJ91zLfgs/1fgBwSxHuUJCtQ6bGiXAACvKITKklg1PgFQU5ZNfXgh88Fdjjtxz5tTtkGn7hrICB/uv2oVDjNDjibzchsyfOO3iv3Rnfi7JbgJnwXv9Oe90twD0+Nkb3erbkGqnDhi+NPhgZzoULGz0M58NsIFQNh4VOl70Oe9z0twliqw5H1BR02FCT02FO0JtYAUfo9Rpcv8qxCm4h5yS4fmfcsQ7mkiAVa2HaDKHEapi0Tb+edXiFUnLVsEsQ8qyG6QV3cvWwdONcWA+TNuE/PVCB69d5ctXwaz4B5VoKcCF3/9Do15wGv9YOyHbL82DfIdvGs+B4o+8HHba1xKaFrIetJdsQbweU2o2nwG7DP0ue1GH9VjwbZVin02akCJcvjfRVnZ8v9JH+9Djv029z37f7lsf/igM+4AM+4OsNsa42drvaoPBqo82rDWOvNT5+AZUDQ3c7r113AAAAAElFTkSuQmCC" class="sns-btn" onMouseDown="ga('send','event','aboutme','tw')">
            </a>
            <?php // if ( $this->is_mobile ):?>
            <a href="line://msg/text/HAIR%20about%20ME%20-%20<?php // echo $this->escape($this->data['nickname']) ?>'s%20HAIR%20STYLE%20LOG%20%7C%20<?php // echo $this->escape(urlencode($share_url)) ?>" target="_blank">
                <img width="32" src="data:image/png;base64,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" class="sns-btn" onMouseDown="ga('send','event','aboutme','ln')">
            </a>
            <?php // endif;?>
        </div>
    <!--
            <nav>
                <ul class="Page-Breadcrumb">
                    <li>TOP</li>
                    <li><a href="https://hair.cm/about">STYLIST</a></li>
                    <li><a href="https://hair.cm/about/area/<?php // echo $this->data["area_id"];?>"><?php // echo $this->escape($this->data["area"]);?></a></li>
                    <li><?php // echo $this->escape($this->data["nickname"]);?><?php // echo ( ! empty($this->data["shop_name"]) ) ? "(" . $this->escape($this->data["shop_name"]) . ")" : "";?></li>
                </ul>
            </nav>
            -->
    </div>
    <div class="User-Profile">
        <h3 class="User-Profile-Name">{{$userData->nickname}}</h3>
        @if ($userStatus->type === 1)
            <p class="User-Profile-Type">スタイリスト / {{$userData->area}}</p>
        @elseif ($userStatus->type === 2)
            <p class="User-Profile-Type">ヘアモデル / {{$userData->area}}</p>
        @endif
        <p class="User-Profile-Description">{{$userData->message}}</p>
        @if (isset($salonInfo))
        <div class="User-Profile-SalonInfo" id="box">
            <h4 class="User-SalonInfo-Caption">サロン情報</h4>
            <dl class="User-SalonInfo-Table">
                <dt>サロン名</dt>
                @if (!empty($salonInfo->shop_name))
                <dd>{{$salonInfo->shop_name}}
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>サロン紹介</dt>
                @if (!empty($salonInfo->shop_description))
                <dd>{{nl2br($salonInfo->shop_description)}}</dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>住所</dt>
                @if (!empty($salonInfo->address))
                <dd><a href="http://maps.google.co.jp/maps?q=<?php // echo rawurlencode($this->salonInfo["address"]);?>"><?php // echo $this->escape($this->salonInfo["address"]);?></a></dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>営業時間</dt>
                @if (!empty($salonInfo->business_hours))
                <dd>{{nl2br($salonInfo->business_hours)}}</dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>休日</dt>
                @if (!empty($salonInfo->holiday))
                <dd>{{nl2br($salonInfo->holiday)}}</dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>メニュー・料金</dt>
                @if (!empty($salonInfo->menu))
                <dd>{{nl2br($salonInfo->menu)}}</dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>電話番号</dt>
                @if (!empty($salonInfo->tel))
                <dd><a class="link-tel" href={{"tel:".$salonInfo->tel}}>{{$salonInfo->tel}}</a></dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <dl class="User-SalonInfo-Table">
                <dt>予約ページURL</dt>
                @if (!empty($salonInfo->button_url))
                <dd><a class="link-net" href={{$salonInfo->button_url}} target="_blank">{{$salonInfo->button_url}}</a></dd>
                @else
                <dd>-</dd>
                @endif
            </dl>
            <div class="User-SalonInfo-Toggle"><span>続きを見る</span></div>
        </div>
        @endif
        @if ($line == false)
        <div class="User-Reserves">
            @if (!empty($salonInfo->button_url))
            <a class="User-Reserve-Button User-Reserve-Url" href={{$salonInfo->button_url}} target="_blank"><i class="Icon Icon-Global"></i>空席確認・ネット予約</a>
            @endif
            @if (!empty($salonInfo->tel))
            <a class="User-Reserve-Button User-Reserve-Tel" href={{"tel".$salonInfo->tel}}><i class="Icon Icon-Tel"></i>電話予約</a>
            @endif
        </div>
        @endif
        <ul class="User-Profile-Follows">
            <li><span>{{$userStatus->following_amount}}</span>フォロー</li>
            <li><span>{{$userStatus->follower_amount}}</span>フォロワー</li>
            @if ($userStatus->type > 0)
            <li><span>{{$userData->total_view}}</span>views</li>
            @endif
        </ul>
    </div>
    <div class="User-Status">
        <ul class="User-Status-Menu">
            @if ($userData->photo_count > 0)
            <li class="User-Status-Tab" data-tab="1"><span>{{$userData->photo_count}}</span>写真</li>
            @else
            <li class="User-Status-Tab disabled" data-tab="1"><span>-</span>写真</li>
            @endif

            @if ($userData->like_count > 0)
            <li class="User-Status-Tab" data-tab="2"><span>{{$userData->like_count}}</span>いいね</li>
            @else
            <li class="User-Status-Tab disabled" data-tab="2"><span>-</span>いいね</li>
            @endif

            @if ($userData->taggedCount > 0)
            <li class="User-Status-Tab" data-tab="3"><span>{{$userData->taggedCount}}</span>タグ付け</li>
            @else
            <li class="User-Status-Tab disabled" data-tab="3"><span>-</span>タグ付け</li>
            @endif

            @if ($userData->pickup_count > 0)
            <li class="User-Status-Tab" data-tab="4"><span>{{$userData->pickup_count}}</span>掲載実績</li>
            @else
            <li class="User-Status-Tab disabled" data-tab="4"><span>-</span>掲載実績</li>
            @endif

        </ul>
        <div class="User-Status-Active"></div>
    </div>
    <div class="User-Status-Content-Wrapper">
        <div class="User-Status-Content" data-content="1" data-requesttype="snaps"></div>
        <div class="User-Status-Content" data-content="2" data-requesttype="likes"></div>
        <div class="User-Status-Content" data-content="3" data-requesttype="tagged"></div>
        <div class="User-Status-Content" data-content="4" data-requesttype="pickups"></div>
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<div class="Overlay">
    <div class="Snap-View">
        <div class="Snap-View-Content">
        </div>
    </div>
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<script src="http://hair.cm/about/js/aboutme-app.js"></script>
<script>
    (function(img) {
        img.onerror = function() {
            img.src = "https://s3-ap-northeast-1.amazonaws.com/hair-richmedia/default_icon/hair_default_icon.png";
        };
    })(document.getElementById("js-IconImage"));
</script>
</body>
</html>
