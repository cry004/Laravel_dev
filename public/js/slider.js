var imgWidth,imgLength;
var cBox,cContent;
var goPre,goNext;
var indexNow,repeat = 2;
var isAnimate = false;
var transitionEvent;


function init(){
	cBox = document.querySelector(".Carousel-Box");
	cContent = document.querySelector(".Carousel-Content");
	imgLength = cBox.children.length;
	goPre = document.querySelector(".GoPre");
	goNext = document.querySelector(".GoNext");
	indexNow = -3;
	
	var totalNodes = cBox.childNodes;
	for (i = 0; i < repeat; i++){
		for (j = 0; j < imgLength; j++){
		var tempNew = totalNodes[j].cloneNode(true);
		cBox.appendChild(tempNew);
		}
	}
	/* Listen for a transition! */
	transitionEvent = whichTransitionEvent();
	transitionEvent && cBox.addEventListener(transitionEvent, function() {
		slider.Check();
	});
	/*
	The "whichTransitionEvent" can be swapped for "animation" instead of "transition" texts, as can the usage :)
*/
		goPre.onclick = function(){slider.PreFun(); };	
		goNext.onclick = function(){slider.NextFun(); };
	
	window.onresize = function(event) {
		imgWidth = cContent.offsetWidth;
		cBox.style["transform"] = 'translateX('+indexNow*imgWidth+'px)';
	}
}

var slider = (function(){
	var val;
	function changeImage(val){
		if(!isAnimate){
			this.val = val;
			imgWidth = cContent.offsetWidth;
			indexNow += val;
			//console.log(indexNow);
			isAnimate = true;
			cBox.style["transition"] = '';
			cBox.style["transform"] = 'translateX('+indexNow*imgWidth+'px)';
		}
	}
	function check(){
		if( this.val > 0 ){ //pre
			if(indexNow > -3){
				indexNow = imgLength*-1-2;
				cBox.style["transition"] = 'inherit';
				cBox.style["transform"] = 'translateX('+indexNow*imgWidth+'px)';
			}
		}else{ //next
			if(indexNow < imgLength*-2){
				indexNow = imgLength*-1-1;
				cBox.style["transition"] = 'inherit';
				cBox.style["transform"] = 'translateX('+indexNow*imgWidth+'px)';
			}
		}
		isAnimate = false;
	}
	return {
		PreFun: function(){
			changeImage(1);
		},
		NextFun: function(){
			changeImage(-1);
		},
		Check: function(){
			check();
		}
	}
})();

/* From Modernizr */
function whichTransitionEvent(){
    var t;
    var transitions = {
      'transition':'transitionend',
      'OTransition':'oTransitionEnd',
      'MozTransition':'transitionend',
      'WebkitTransition':'webkitTransitionEnd'
    }

    for(t in transitions){
        if( cBox.style[t] !== undefined ){
            return transitions[t];
        }
    }
}

init();