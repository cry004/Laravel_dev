<div class="Carousel section-large-spacing js-Carousel">
    <div class="Carousel-Scene">
        <ul class="Carousel-Box js-CarouselBox"><!--
            @foreach ( $carousels as $carousel )
            --><li class="Carousel-Content Carousel-Snap js-CarouselContent" style="background-image:url('{{ $carousel->getFilePath() }}');">
                <a href="{{ $carousel->getPhotographURL() }}">
                    <div class="Carousel-Text Carousel-Stylist">
                        <img src="{{ config('aws.cloudfront') }}/users/icon/{{ $carousel->iconpath }}" width="64" class="round-image"> 
                        <p class="Carousel-Stylist-Name">{{ $carousel->nickname }}</p>
                        <p class="Carousel-Stylist-Salon">{{ $carousel->shop_name }}</p>
                    </div>
                </a>
            </li><!--
            @endforeach
        --></ul>
    </div>
    <div class="Carousel-Arrow">
        <div class="GoPre js-CarouselPrev"></div>
        <div class="GoNext js-CarouselNext"></div>
    </div>
</div>
