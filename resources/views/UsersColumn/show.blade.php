@extends('global')

@section('contents')
    <div class="Content Grid Grid2-1 section-spacing">
        <div class="Grid-Content">
            <header class="NewsMeta">
                <time>{{ (new \DateTime($column->created))->format("Y.m.d") }}</time>
                <h1 class="NewsMeta-Title">{{ $column->title }}</h1>
                <p class="NewsMeta-Description">{!! nl2br(e($column->description)) !!}</p>
            </header>
            <article class="NewsDetail">
                @foreach($column->ColumnParts as $ColumnContent)
                    {!! $ColumnContent->getContentText() !!}
                @endforeach
            </article>
        </div>
        <div class="Grid-Content">
            {{-- @include("components.stylist_recommends") --}}
            @include("components.owner_pickup_articles")
            @include("banners.line")
            @include("components.facebook_timeline")
        </div>
    </div>

    <hr class="section-border" />
@endsection

<style>
    .wp-post-image{
        height:auto;
        width:399px;
    }
    .wp-post-image{
        text-align:center;
    }

    .curation_thumbnail{
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>
