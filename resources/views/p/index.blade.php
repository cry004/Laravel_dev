@inject('ViewUtil', 'App\Services\ViewUtil')
@extends('pglobal')

@section('breadcrumbs')
@endsection

@section('extraCss')
    <link href="/css/p/main.css" rel="stylesheet" type="text/css">
@endsection

@section('contents')
    <div id="container">
        <img src={{ $ViewUtil::getZoomImageResourceUrl($photo->filename) }} id="post-img" alt="<?php ////echo $this->escape($this->formattedTitle);?>">
        <div id="content">
            <div id="user-content" data-username={{ $photo->username }} >
                <img src={{  $ViewUtil::getUserIconImageResourceUrl($photo->uuid) }} id="user-img">
                <div class="user-detail">
                    <div class="user-name">
                        {{ $photo->nickname }}
                    </div>
                    <div class="post-date">
                        {{ $photo->postedDate() }}
                    </div>
                </div>
            </div>
            <?php if ( isset($selfProtag) && (! empty($selfProtag->button_url) || ! empty($selfProtag->tel)) ):?>
                <div class="User-Reserves">
                <?php if ( ! empty($selfProtag->button_url) ):?>
                    <?php if((int)$photo->user_type==2): ?>
                    <a class="User-Reserve-Button User-Reserve-Url" href={{ $selfProtag->button_url }} target="_blank" onclick="ga('send','event', location.href, 'click_reserve_net_button');"><i class="Icon Icon-Global"></i>撮影依頼</a>
                    <?php else: ?>
                    <a class="User-Reserve-Button User-Reserve-Url" href={{$selfProtag->button_url}} target="_blank" onclick="ga('send','event', location.href, 'click_reserve_net_button');"><i class="Icon Icon-Global"></i>空席確認・ネット予約</a>
                    <?php endif; ?>
                <?php endif;?>
                <?php if ( ! empty($selfProtag->tel) ):?>
                    <?php if((int)$photo->user_type==2):?>
                        <a class="User-Reserve-Button User-Reserve-Tel" href="tel:{{ $selfProtag->tel}}" onclick="ga('send','event', location.href, 'click_reserve_tel_button');"><i class="Icon Icon-Tel"></i>撮影依頼</a>
                    <?php else: ?>
                        <a class="User-Reserve-Button User-Reserve-Tel" href="tel:{{ $selfProtag->tel}}" onclick="ga('send','event', location.href, 'click_reserve_tel_button');"><i class="Icon Icon-Tel"></i>電話予約</a>
                    <?php endif;?>
                <?php endif;?>
                </div>
            <?php endif;?>
        <div id="tags">
            <?php if (isset($categoryTags)): ?>
                <a href={{$categoryTags->id }}>{{ $categoryTags->name }}</a>
            <?php endif;?>
            <?php if (isset($categoryTags)): ?>
                <?php foreach($keywordTags as $tag): ?>
                    <a href={{ $tag->id }}>{{ $tag->name }}</a>
                <?php endforeach; ?>
            <?php endif;?>
        </div>
        <div id="desc">
            {{ nl2br(e($photo->caption)) }}
        </div>
        <div id="like-desc">
            <span class="like-num">{{$photo->like_amount}}人</span>が<img src="http://hair.cm/p/images/heart.png" id="heart"/>しました
        </div>
        <div id="sns">
            <?php //$share_url = 'https://hair.cm/p/'.$this->photographRegistKey ?>
            <?php //$share_desc = str_replace("+","%20",urlencode($this->siteName. " | ヘアスタイルスナップ- HAIR ". $share_url)); ?>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php //echo $share_url ?>" target="_blank"><img src="http://hair.cm/about/images/button_fb.png" class="sns-btn" onMouseDown="ga('send','event','share_page','fb')"></a>
            <a href="https://twitter.com/home?status=<?php //echo $share_desc ?>"  target="_blank"><img src="http://hair.cm/about/images/button_tw.png" class="sns-btn" onMouseDown="ga('send','event','share_page','tw')"></a>
            <a href="https://plus.google.com/share?url=<?php //echo $share_url ?>"  target="_blank"><img src="http://hair.cm/about/images/button_gp.png" class="sns-btn" onMouseDown="ga('send','event','share_page','gp')"></a>
            <a href="mailto:?&Subject=HAIR%20about%20ME&Body=<?php //echo $share_desc ?>"  target="_blank"><img src="http://hair.cm/about/images/button_ml.png" class="sns-btn" onMouseDown="ga('send','event','share_page','ml')"></a>
            <a href="line://msg/text/<?php //echo $share_desc ?>"  target="_blank" id="ln-btn"><img src="http://hair.cm/about/images/button_ln.png" class="sns-btn" onMouseDown="ga('send','event','share_page','ln')"></a>
        </div>
        <div id="pops">
            <h2 class="headline-s">{{$photo->nickname}}</h2>
            <div class="clearfix photos">
                <?php foreach($popularPhotographData as $popularPhotographData): ?>
                <a href={{"/p/".$popularPhotographData->regist_key}} class="pop-img" onMouseDown="ga('send','event','share_page','thumbnail')">
                    <img src={{ $ViewUtil::getLargeThumbImageResourceUrl($popularPhotographData->filename)}} />
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <aside class="latest_articles">
            <h2 class="headline-s">新着ヘアスタイル情報</h2>
            <ul>
                <!-- delete -->
                <li class="sec sec-post sec-archive clearfix">
                    <a href="https://hair.cm/column/17501">
                        <img width="126" height="150" src="https://d3kszy5ca3yqvh.cloudfront.net/wp-content/uploads/2016/08/2.png" class="attachment-thumbnail wp-post-image" alt="eyecatch_17501">
                        <div class="post-content">
                            <p class="date">2016/08/04</p>
                            <h3 class="title">ワードプレスのDBからとってくるので移行後に作る。</h3>
                            <div class="excerpt">
                                <p>ワードプレスのDBからとってくるので移行後に作る</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php //foreach($this->articles as $article): ?>
                <li class="sec sec-post sec-archive clearfix">
                    <a href="<?php //echo $article['link'] ?>">
                        <img width="126" height="150" src="<?php //echo $article['eyecatch_url'] ?>" class="attachment-thumbnail wp-post-image" alt="eyecatch_<?php //echo $article['ID'] ?>">
                        <div class="post-content">
                            <p class="date"><?php //echo $article['post_date'] ?></p>
                            <h3 class="title"><?php //echo $article['title'] ?></h3>
                            <div class="excerpt">
                                <p><?php //echo $article['excerpt'] ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php //endforeach; ?>
            </ul>
        </aside>
    </div>
    </div>
@endsection
