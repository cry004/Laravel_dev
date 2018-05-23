@if ( isset($rshow) && $rshow === true )
<div class="Banner section-spacing R-Show">
@else
<div class="Banner section-spacing R-Hidden">
@endif
    <a href="{{ AppUrl::to('r/app_download?source=sidebanner' )}}">
        <img src="https://d3kszy5ca3yqvh.cloudfront.net/banners/app_banner.jpg" alt="アプリダウンロード" width="285">
    </a>
</div>
