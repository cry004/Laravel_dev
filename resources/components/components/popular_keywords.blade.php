<div class="Heading section-spacing">
    <h3 class="Heading-Text">人気のキーワード</h3>
</div>

<input type="checkbox" value="1" id="accordion0{{ $acid }}" class="hidden toggle-checkbox">
<section class="Content-Overflow section-spacing js-Toggle" data-count="{{ count($keywords) }}">
    @foreach ( $keywords as $keyword )
    <div class="TextLabel">
        <a href="{{ AppUrl::to('tag/' . $keyword->keyword_id) }}">{{ $keyword->text_content }}</a>
    </div>
    @endforeach
</section>
@if ( count($keywords) > 5 )
<div class="Content-Overflow-Toggle R-Show section-spacing">
    <label for="accordion0{{ $acid }}">すべて見る<i class="Icon Icon-ic_keyboard_arrow"></i></label>
</div>
@endif
