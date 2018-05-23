<div class="Carousel section-large-spacing js-Carousel">
    <div class="Carousel-Scene">
        <ul class="Carousel-Box js-CarouselBox"><!--
            @foreach ( $carousels as $carousel )
            --><li class="Carousel-Content js-CarouselContent">
                <figure>
                    <a href="{{ $carousel->link_url }}">
                        <img src="{{ $carousel->image_url }}" alt="{{ $carousel->title }}" width="538">
                    </a>
                    <figcaption class="Carousel-Text Carousel-Article">
                        <a href="{{ $carousel->link_url }}">
                            {{ $carousel->title }}
                            {{--<span class="Article-Logo Article-Logo--voce"><i class="Icon Icon-logo_voce"></i></span>--}}
                        </a>
                    </figcaption>
                </figure>
            </li><!--
            @endforeach
        --></ul>
    </div>
    <div class="Carousel-Arrow">
        <div class="GoPre js-CarouselPrev"></div>
        <div class="GoNext js-CarouselNext"></div>
    </div>
</div>
