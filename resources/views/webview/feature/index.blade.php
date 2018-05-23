<!doctype html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title></title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
		<style type="text/css">
			body {
				font-family: 'Lucida Grande', Verdana, Arial, 'Hiragino Kaku Gothic Pro', Meiryo, 'メイリオ', sans-serif;
			}
			.Feature-Head {
				line-height: 1.5em;
				font-size: 1.5em;
				text-align: center;
				border-bottom: 2px solid #6cc;
				font-weight: normal;
				margin: 0;
				padding: 0;
		
			}
			.Feature-List {
				font-size: 14px;
			}
			.Feature-List-Item {
				margin: 5px 0;
				padding: 0 10px;
				min-height: 76px;
				border-bottom: solid 1px #ccc;
				overflow: hidden;
			}
			.Feature-List-Item > a {
				color: #333;
			}
			.Feature-List-Item-Image {
				float: left;
				margin-bottom: 5px;
			}
			.Feature-List-Item-Content {
				float: right;
				width: 70%;
			}
			.Feature-List-Item-Content > p {
				margin: .5em 0;
			}
		</style>
		<script>
		 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		 var ga_first_day = function(){
			 try {
				 var f = function (d) {
					 return d.getFullYear() + ("0" + (d.getMonth() + 1)).slice(-2) + ("0" + d.getDate()).slice(-2);
				 };
				 var c = document.cookie;
				 var i = c.indexOf('_utma');
				 var s = null;
				 
				 if (i < 0) {
					 s = f(new Date());
					 document.cookie = '_utma' + '=' + encodeURIComponent(s);
				 } else {
					 s = c.substring(i+6, i+14);
				 }
				 
				 if(s) {
					 return s;
				 }else{
					 return '00000000';
				 }
			 } catch (e) {
				 return '00000000';
			 }
		 }

		 ga('create', 'UA-49269730-3', 'auto');
		 ga('set', 'dimension1', ga_first_day());
		 ga('send', 'pageview');
		</script>
	</head>
	<body>
		@if ( $magazineId == 2 )
		<h2 class="Feature-Head" style="line-height:1.0"><img src="https://s3-ap-northeast-1.amazonaws.com/hair-richmedia/banners/logo_voce_78_40.png" alt="voce" height="40" style="padding: 4px 0"></h2>
		@else
		<h2 class="Feature-Head">COLUMN一覧</h2>
		@endif
		<div class="Feature-List">
			@foreach( $features as $index => $entry )
			<div class="Feature-List-Item" data-listindex="{{ $index + 1 }}">
				<a href="{{ $entry->url }}">
				<img src="https://d3kszy5ca3yqvh.cloudfront.net/{{ $entry->image }}" class="Feature-List-Item-Image" width="76">
				<div class="Feature-List-Item-Content">
					<time>{{ str_replace('-', '.', $entry->approve_date) }}</time>
					<p>{{ nl2br($entry->text) }}</p>
				</div>
				</a>
			</div>
			@endforeach
		</div>
		<script type="text/javascript" src="https://hair.cm/wp-content/themes/hair-theme/js/imp.js"></script>
		<script>
			(function() {
				var imp         = ImpWatcher.make();
				var featureList = document.querySelectorAll(".Feature-List-Item");
				var gaSender    = function(index, type, link) {
					return function() {
						ga("send", "event", "feature/2", "column" + index + "_" + type, link);
					};
				};

				[].forEach.call(featureList, function(element) {
					var index = element.getAttribute("data-listindex");
					var link  = element.querySelector("a").href;

					imp.add(element, gaSender(index, "imp", link));
					element.addEventListener("click", gaSender(index, "click", link));
				});

				imp.watch();
			})();
		</script>
	</body>
</html>
