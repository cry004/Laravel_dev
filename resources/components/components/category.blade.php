@foreach ( $categories as $category )
<div class="ImageText ImageText-MultiLine ImageText-Transparent">
    <a href="{{ AppUrl::to('tag/' . $category->keyword_id) }}">
        <img src="{{ $category->eye_catch }}" class="ImageText-Image round-square-image" alt="{{ $category->name }}" width="64">
        <div class="ImageText-Text">{{ $category->name }}<span>({{ $category->article_amount }})</span></div>
    </a>
</div>
@endforeach
