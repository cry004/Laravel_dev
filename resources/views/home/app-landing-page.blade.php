<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>

<?php
$img_arr = array("/images/001.jpg",
		 "/images/002.jpg",
		 "/images/003.jpg",
		 "/images/004.jpg",
		 "/images/005.jpg",
		 "/images/006.jpg",
		 "/images/007.jpg",
		 "/images/008.jpg",
		 "/images/009.jpg",
		 "/images/010.jpg",
		 "/images/011.jpg"
);
if (is_mobile()){
    $mobile_arr = array();
    $keys = array_rand($img_arr,3);
    foreach($keys as $key){
	$mobile_arr[] = $img_arr[$key];
    }
    $img_arr = $mobile_arr;
}
shuffle($img_arr);

function is_mobile () {
    $useragents = array(
	'iPhone', // Apple iPhone
	'iPod', // Apple iPod touch
	'Android', // 1.5+ Android
	'dream', // Pre 1.5 Android
	'CUPCAKE', // 1.5+ Android
	'blackberry9500', // Storm
	'blackberry9530', // Storm
	'blackberry9520', // Storm v2
	'blackberry9550', // Storm v2
	'blackberry9800', // Torch
	'webOS', // Palm Pre Experimental
	'incognito', // Other iPhone browser
	'webmate' // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

?>
<div class="single contents clearfix">
    <div class="">

	<section class="sec sec-post clearfix">

	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="/css/applp.css" />

	    <div id="fb-root"></div>
	    

	    <div class="background">
		<div class="transparent"></div>
		<ul id="background-imgs">
		    <?php if(is_mobile()): ?>
			<?php foreach($img_arr as $img): ?>
			    <li><img class="bg-img" src="<?php echo $img ?>"/></li>
			<?php endforeach; ?>
		    <?php else: ?>
			<?php foreach($img_arr as $img): ?>
			    <li><img src="<?php echo $img ?>" style="opacity: 0.5; display: none;"></li>
			    <?php /* <li><img src="<?php echo $img ?>" style="opacity: 0.5;"></li> */ ?>
			<?php endforeach; ?>
		    <?php endif; ?>
		</ul>
	    </div>

	    <div class="container-fluid" id="foreground">

		<div class="top">
		    <h1><img src="/images/HAIR_logo.png" alt="HAIR" class="hair_logo" /></h1>
		    <div class="release">
			<?php if (is_mobile()): ?>
			    <a href="https://hair.cm/r/app_download?source=app_landing_page" onMouseDown="ga('send','event','app_landing_page','appstore', 'upper')"><img src="/images/app-store.png" alt="- 15th MAY -" class="releaseday"/></a>
			    <a href="https://hair.cm/r/app_download?source=app_landing_page" onMouseDown="ga('send','event','app_landing_page','googleplay', 'upper')"><img src="/images/Google-Play-Badge.png" alt="- 9th Sep -" class="releaseday"/></a>
			<?php else: ?>
			    <a href="https://itunes.apple.com/jp/app/heasutairusunappu-hair/id836755631?pt=608375&ct=app_landing_page&mt=8" onMouseDown="ga('send','event','app_landing_page','appstore', 'upper')"><img src="/images/app-store.png" alt="- 15th MAY -" class="releaseday"/></a>
			    <a href="https://play.google.com/store/apps/details?id=jp.co.rich.android.hair&referrer=utm_source%3Dapp_landing_page_pc" onMouseDown="ga('send','event','app_landing_page','googleplay', 'upper')"><img src="/images/Google-Play-Badge.png" alt="- 9th Sep -" class="releaseday"/></a>
			<?php endif; ?>
		    </div>
		    <h2 class="lp-headline">HAIR is FASHION<br class="br-sp"/><span> - </span>ヘアスタイルを<br class="br-sp"/>もっと楽しもう！</h2>
		    <div class="top-desc">
			毎日のヘアスタイルが楽しくなる。<br/>
			ヘアスナップが女の子の新しいライフスタイルになる。<br/>
			スタイリストのサロンワークが見えてくる。<br/>
		    </div>
		  <div class="facebookLikeBox">
				<iframe src="https://www.facebook.com/plugins/page.php?href=http%3A%2F%2Fwww.facebook.com%2Fhair.cm&tabs=timeline&width=700&height=240&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true" width="500" height="240" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
		  </div>
		</div><!-- top -->

		<div class="app">
		    <h3><img src="/images/HAIRapp_logo.png" class="hairapp_logo" alt="HAIR app" /></h3>
		    <p class="desc">
			※ iOS ver 9.0以降 / Android4.0.3以降が必要です
		    </p>
		    <ul class="row app-img">
			<li class="appimg"><img src="/images/start_1.png" alt="HAIR is FASHION ヘアスタイルをもっと楽しもう!"></li>
			<li class="appimg"><img src="/images/start_2.png" alt="みんなのヘアスタイルから新しい自分のきっかけを見つけよう!"></li>
			<li class="appimg"><img src="/images/start_3.png" alt="シーンに合わせてヘアスナップを気軽に撮って保存しよう!"></li>
			<li class="appimg"><img src="/images/start_4.png" alt="HAIRアプリ スクリーンショット"></li>
		    </ul>
		    <?php if(is_mobile()): ?>
		  <div class="container">
				<iframe class="hairvideo" src="//player.vimeo.com/video/90528051?api=1&title=0&byline=0&portrait=0&playbar=0&loop=0&autoplay=1&player_id=okplayer" frameborder="0" id="okplayer"></iframe>
			</div>
		    <?php else: ?>
			<a id="play" href="#play"></a>
			<div class="top-desc">HAIR PV 90sec. HD</div>
			<div id="video"></div>
		    <?php endif; ?>
		</div><!-- app -->
		
		<div class="release">
		    <?php if (is_mobile()): ?>
			<a href="https://hair.cm/r/app_download?source=app_landing_page" onMouseDown="ga('send','event','app_landing_page','appstore', 'bottom')"><img src="/images/app-store.png" alt="- 15th MAY -" class="releaseday"/></a>
			<a href="https://hair.cm/r/app_download?source=app_landing_page" onMouseDown="ga('send','event','app_landing_page','googleplay', 'bottom')"><img src="/images/Google-Play-Badge.png" alt="- 9th Sep -" class="releaseday"/></a>
		    <?php else: ?>
			<a href="https://itunes.apple.com/jp/app/heasutairusunappu-hair/id836755631?pt=608375&ct=app_landing_page&mt=8" onMouseDown="ga('send','event','app_landing_page','appstore', 'bottom')"><img src="/images/app-store.png" alt="- 15th MAY -" class="releaseday"/></a>
			<a href="https://play.google.com/store/apps/details?id=jp.co.rich.android.hair&referrer=utm_source%3Dapp_landing_page_pc" onMouseDown="ga('send','event','app_landing_page','googleplay', 'bottom')"><img src="/images/Google-Play-Badge.png" alt="- 9th Sep -" class="releaseday"/></a>
		    <?php endif; ?>
		</div>

		<footer>
		    <a href="/agreement.html">利用規約</a> /
		    <a href="/privacy.html">プライバシーポリシー</a><span class="sp-none"> / </span><br class="br-sp" />
		    <a href="http://www.rich.co.jp">運営会社</a> / <a href="/support.html">お問い合わせ</a>
		    <div class="cp">Copyright&copy; RichMedia Co., Ltd. <br class="br-sp"/>All Rights Reserved.</div>
		</footer>
	    </div>

	    <script type="text/javascript">
	     <?php if (!is_mobile()): ?>	     
	     $(window).ready(function(){
		 // Fade対象要素をまとめて取得
		 var images = $("#background-imgs > li > img");
		 console.log(images);

		 // 実行関数
		 function fade(index) {
	             // それ以上要素が無ければ最初から
		     if ( images.eq(index).length === 0 ) {
			 fade(0);
		     }

		     if ( index > 0 ) {
			 setTimeout(function(){
		             images.eq(index - 1).hide();
			 }, 1000);
		     }

		     // フェード後、再帰処理
		     var img = images.eq(index);
		     img.fadeTo(500, 1, function() {
			 setTimeout(function() {
			     img.fadeTo(500, 0);
			     fade(++index);
			 }, 2500);
		     });
		 }

		 fade(0); // 0番目から始める
	     });
	     <?php endif; ?>

	     $(document).on('click', '#play', function(){
		 $("#video").append('<iframe src="//player.vimeo.com/video/90528051?api=1&title=0&byline=0&portrait=0&playbar=0&loop=0&autoplay=1&player_id=okplayer" frameborder="0" style="position: fixed; left: 0px; top: 0px; overflow: hidden; z-index: 100; height: 100%; width: 100%; visibility: visible; background-color: black;" id="okplayer"></iframe><div id="close"><img src="/images/button_close.png" style="width: 15px; height: 15px;" /></div><iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fhair.cm&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=true&amp;height=21&amp;appId=689178994438262" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true" id="fb-like-on-movie"></iframe>');
	     });

	     $(document).on('click','#close', function(){
		 $("#close").remove();
		 $("#okplayer").remove();
		 $("#fb-like-on-movie").remove();
	     });
	    </script>
	</section>


	<div id="fb-root"></div>
		</div>
	</div>
	<script>
	 (function(){
	     // DOM用意
	     var chk_el = document.querySelector('.sidebar-checkbox');
	     var body_el = document.querySelector('body');
	     var default_class = body_el.className;

	     // changeイベントでクラス付与、削除
	     chk_el.addEventListener("change", function(){
		 if( chk_el.checked ) {
		     body_el.className = default_class + " is_open"; }
		 else { body_el.className = default_class; }
	     }, false);

	 })();
	</script>
	<script type="text/javascript">
	 $(function(){
	     $("#search-button").click(function(){
		 $("#global-header").toggleClass("is_active");
		 $("#search-box").fadeToggle(function(){
		     $("#search-box .field").focus();
		 });
	     });
	 });
	</script>
</body>
</html>