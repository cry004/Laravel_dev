<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-K9J8Z2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K9J8Z2');</script>
<!-- End Google Tag Manager -->
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