$(document).ready(function(){
    var ua = {};
    ua.name = window.navigator.userAgent.toLowerCase();
    ua.isiPhone = ua.name.indexOf('iphone') >= 0;
    ua.isiPod = ua.name.indexOf('ipod') >= 0;
    ua.isiPad = ua.name.indexOf('ipad') >= 0;
    ua.isiOS = (ua.isiPhone || ua.isiPod);
    ua.isAndroid = ua.name.indexOf('android') >= 0;
    /* bxslider */
    var option;
    if(window.innerWidth < 650 || ua.isiOS || ua.isAndroid){
        option = { touchEnabled: true, infiniteLoop: true };
    } else {
        option = { slideMargin: 40, slideWidth: 640, auto: true, infiniteLoop: true };
    }
    var slider = $('.bxslider').bxSlider(option);

    /* If from_app in Cookie, Show Back to App Btn */
    if (document.cookie) {
	var cookies = document.cookie.split("; ");
	for (var i = 0; i < cookies.length; i++) {
	    var str = cookies[i].split("=");
	    if (str[0] == 'from_app') {
		if (ua.isiOS && !ua.isiPad) $('#back-to-app-button').show();
		else $('#back-to-app-button').hide();
		break;
	    }
	}
    }

    $("#searchform").submit(function()　{
        var value = $(this).children("#s").val();
        ga('send','event', 'top','search', value);
    });
});
$(document).ready(function(){
    var ua = {};
    ua.name = window.navigator.userAgent.toLowerCase();
    ua.isiPhone = ua.name.indexOf('iphone') >= 0;
    ua.isiPod = ua.name.indexOf('ipod') >= 0;
    ua.isiPad = ua.name.indexOf('ipad') >= 0;
    ua.isiOS = (ua.isiPhone || ua.isiPod);
    ua.isAndroid = ua.name.indexOf('android') >= 0;
    /* bxslider */
    var option;
    if(window.innerWidth < 650 || ua.isiOS || ua.isAndroid){
        $('.HAIRtoTiful').html('<a href="https://tiful.jp/"><img style="width:100%;"src="https://hair.cm/wp-content/themes/hair-theme/img/HAIRtoTiful_lead_banner.jpg"></a>');
    }
});

/**
 * kodama
 *
 * @param window
 * @param document
 * @param undefined
 *
 * @usage
 *  kodama.init({
 *     offset: 200,
 *     throttle: 20,
 *     loadedClass: 'is-loaded'
 *  });
 */
window.kodama = function( window, document, undefined ) {
    var store = [],
    offset, throttle, poll, lazyAttr, loadedClass;
    var _inView = function( el ) {
        var coords = el.getBoundingClientRect();
        return ( coords.top >= 0 && coords.left >= 0 && coords.top ) <= ( window.innerHeight || document.documentElement.clientHeight ) + parseInt( offset, 10 );
    };
    var _pollImages = function( lazyAttr, loadedClass ) {
        var self, parents;
        lazyAttr = lazyAttr || "data-src";
        loadedClass = loadedClass || null;
        for ( var i = store.length; i--; ) {
            self = store[ i ];
            parents = self.parentNode;
            if ( _inView( self ) ) {
                self.src = self.getAttribute( lazyAttr );
                if ( loadedClass ) parents.className += parents.className ? " " + loadedClass : loadedClass;
                store.splice( i, 1 );
            }
        }
    };
    var _debounce = function( func, wait, immediate ) {
        var timeout, args, context, timestamp, result;
        var getTime = Date.now || function() {
            return ( new Date() ).getTime();
        };
        return function() {
            context = this;
            args = arguments;
            timestamp = getTime();
            var later = function() {
                var last = getTime() - timestamp;
                if ( last < wait ) {
                    timeout = setTimeout( later, wait - last );
                } else {
                    timeout = null;
                    if ( !immediate ) {
                        result = func.apply( context, args );
                        context = args = null;
                    }
                }
            };
            var callNow = immediate && !timeout;
            if ( !timeout ) {
                timeout = setTimeout( later, wait );
            }
            if ( callNow ) {
                result = func.apply( context, args );
                context = args = null;
            }
            return result;
        };
    };
    var init = function( opts ) {
        opts = opts || {};
        offset = opts.offset || 0;
        throttle = opts.throttle || 20;
        lazyAttr = opts.lazyAttr || "data-src";
        loadedClass = opts.loadedClass || null;
        var nodes = document.querySelectorAll( "[" + lazyAttr + "]" );
        if ( !nodes.length ) return;
        for ( var i = 0; i < nodes.length; i++ ) {
            store.push( nodes[ i ] );
        }
        _pollImages( lazyAttr, loadedClass );
        if ( document.addEventListener ) {
            window.addEventListener( "scroll", _debounce( function() {
                _pollImages( lazyAttr, loadedClass );
            }, throttle ), false );
        } else {
            window.attachEvent( "onscroll", _debounce( function() {
                _pollImages( lazyAttr, loadedClass );
            }, throttle ) );
        }
    };
    return {
        init: init,
        render: _pollImages
    };
}( window, document );

kodama.init({
    offset: 200,
    throttle: 0,
    loadedClass: 'is-loaded'
});
