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
			.Feature-List {
				font-size: 14px;
			}
			.Feature-List-Item {
				margin: 5px 0;
				padding: 10px;
				min-height: 76px;
				border-bottom: solid 1px #ccc;
				overflow: hidden;
			}
			.Feature-List-Item > a {
				color: #333;
				display: block;
				width: 100%;
				height: 100%;
				-webkit-tap-highlight-color: rgba(0,0,0,0);
			}
			.Feature-List-Item-Image {
				float: left;
				margin-bottom: 5px;
			}
			.Feature-List-Item-Content {
				float: right;
				width: 70%;
				position: relative;
				min-height: 76px;
			}
			.Feature-List-Item-Content > time {
				font-size: 0.8rem;
			}
			.Feature-List-Item-Content .Content-Text {
				margin: .2em 0;
				width: 100%;
				overflow: hidden;
				display: -webkit-box;
				-webkit-line-clamp: 2;
				-webkit-box-orient: vertical;
			}
			.Feature-List-Item-Content > .media {
				position: absolute;
				bottom: 0;
				right: 0;
			}
			.Feature-List-Item-Content > .nologo:before {
				content: "[ ";
			}
			.Feature-List-Item-Content > .nologo:after {
				content: " ]";
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
		<div class="Feature-List">
			@foreach( $pickups as $pickup )
			<div class="Feature-List-Item">
				<a href="{{ $pickup->http_url }}" data-appurl="{{ $pickup->app_url }}">
				<img src="https://d23ci79vtjegw9.cloudfront.net/photographs/thumb-m/{{ $pickup->filename }}" class="Feature-List-Item-Image" width="76">
				<div class="Feature-List-Item-Content">
					<p class="Content-Text">{{ nl2br($pickup->title) }}</p>
					@if ( empty($pickup->logo_image) )
						<span class="media nologo">{{ $pickup->name }}</span>
					@else
						<span class="media">
							<img src="https://d23ci79vtjegw9.cloudfront.net/{{ $pickup->logo_image }}" height="17">
						</span>
					@endif
				</div>
				</a>
			</div>
			@endforeach
		</div>
		<script type="text/javascript">
		(function() {
			var WAIT_THRESHOLD = 1000;
			var LAG_TIME = 400;
			var links = document.querySelectorAll(".Feature-List-Item > a");

			[].forEach.call(links, function(link) {
				var appUrl  = link.getAttribute("data-appurl");
				var httpUrl = link.href;

				link.addEventListener("click", function(evt) {
					if ( ! appUrl ) {
						ga("send", "event", location.pathname, "column_click", httpUrl);
						return;
					}

					ga("send", "event", location.pathname, "column_click", appUrl);
					evt.preventDefault();

					var ifr = document.createElement("iframe");
					var start = +new Date;
					ifr.style.display = "none";
					setTimeout(function() {
						document.body.removeChild(ifr);
						var now = +new Date;
						if ( now - start > LAG_TIME ) {
							location.href = httpUrl;
						}
					}, WAIT_THRESHOLD);
					document.body.appendChild(ifr);
					ifr.src = appUrl;

					return false;
				});
			});
		})();
		</script>
	</body>
</html>
