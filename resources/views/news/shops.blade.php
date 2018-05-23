@extends('global')

@section('extra_javascripts')
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
 <script language="JavaScript">
  // Create a connection to the file.
  var Connect = new XMLHttpRequest();
  var NewsDetail = document.querySelector(".NewsDetail");
  var Shoplist = '<ul class="city">';

  Connect.open("GET", "../shops.xml", false);
  Connect.setRequestHeader("Content-Type", "text/xml");
  Connect.send(null);

  var TheDocument = Connect.responseXML;
  var Shops = TheDocument.childNodes[0];

  for (let i = 0; i < Shops.children.length; i++){
  	var City = Shops.children[i];
  	Shoplist = Shoplist + '<li><h2 class="shop-icon-plus">'+ City.getAttribute('name') +'<i></i></h2>';
  	for (let i = 0; i < City.children.length; i++){
  		var Area = City.children[i];
  		Shoplist = Shoplist + '<ul class="block"><h3>'+ Area.getAttribute('name') +'</h3><li><ul class="Shop-name">';
 			for (let i = 0; i < Area.children.length; i++){
	  		var Shop = Area.children[i];
	  		Shoplist = Shoplist + '<li class="Shop-content"><div class="tit">'+ Shop.getAttribute('name') +'</div>';
		 			for (let i = 0; i < Shop.children.length-1; i++){
			  		var Addr = Shop.children[0].textContent.toString();
			  		var Tel = Shop.children[1].textContent.toString();
			  			Shoplist = Shoplist + '<ul><li><div>住所：</div><div class = "addr">'+ Addr +'</div></li><li><div>TEL：</div><div class="tel">'+ Tel +'</div></li></ul>' ;
		 			}
		 		Shoplist = Shoplist + '</li>'
	 		}
	 		Shoplist = Shoplist + '</ul></li></ul>';
 		}
 		Shoplist = Shoplist + '</li>';
 	}
 	Shoplist = Shoplist + '</ul>';
 	NewsDetail.innerHTML = Shoplist;
	var now1=-1,pre1,now2 = -1,pre2;

	if( window.innerWidth<= 1140 ){
		$('.city h2').click(function(){
			now1 = $(this).parent().index();
			$(this).parent().children('.block').children('li').removeAttr('style');
				if(now1!=pre1){
					$('.city').children().eq(pre1).children('ul').slideUp();
					$('.city').children().eq(pre1).children('h2').removeClass("shop-icon-minus").addClass("shop-icon-plus");
					$(this).nextAll('ul').slideToggle();
					pre1 = now1;
				}else{
					$(this).nextAll('ul').slideToggle();
				}
				if($(this).attr("class")=="shop-icon-plus"){
					$(this).removeClass("shop-icon-plus").addClass("shop-icon-minus");
				}else{
					$(this).removeClass("shop-icon-minus").addClass("shop-icon-plus");
				}
		});
		$('.block h3').click(function(){
			now2 = $(this).parent().index();
				if(now2!=pre2){
					$(this).parent().parent().children().eq(pre2).children('li').slideUp();
					$(this).next('li').slideToggle();
					pre2 = now2;
				}else{
					$(this).nextAll('li').slideToggle();
				}
		});
		$('.Shop-content div').click(function(){
			var name = $(this);
			var detail = $(this).next();
			$('.Shops-detail').animate({top: 0+'%'},300,function(){
				$('.Page').css({height:100+'vh',overflow:'hidden'});
				$('.shop-load').append(name).append(detail);
				$(this).find('.closer').click(function(){
					$(this).parent().animate({top: 100+'%'},300,function(){
						$(this).removeAttr('style');
						$('.Page').removeAttr('style');
						$('.shop-load').empty();
					});
				});
			});
		});
	}
</script>
@endsection

@section('extra_global')

@endsection

@section('contents')

@include("components.breadcrumb")

<div class="Content Grid Grid2-1 section-spacing">
	<div class="Shops-title">
		<h1>取扱い店舗リスト</h1>
	</div>
	<div class="Shops-content">
		<h5>※ 2017年4月8日時点の情報です<br/>
				※店舗によっては、売り切れの場合がございます</h5>
		<div class="NewsDetail"></div>
	</div>
</div>
<div class="Shops-detail">
	<div class="closer">X</div>
	<div class="shop-load"></div>
</div>
<hr class="section-border" />
@endsection
