@extends('web.global-web')

@section('page')
<h2>登録完了</h2>
<p class="H-Caption">登録が完了しました。アプリを起動して始めましょう！</p>

<div class="H-Section">
    <div class="H-Action-Group">
        <a href="{{ $app }}" class="H-Button">アプリを起動する</a>
    </div>
</div>
@endsection
