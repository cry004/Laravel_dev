@extends('web.global-web')

@section('page')
<h2>アクティベーション完了</h2>
<p class="H-Caption">アクティベーションが完了しました。アプリを起動して始めましょう！</p>

<div class="H-Section">
    <div class="H-Action-Group">
        <a href="{{ $app }}" class="H-Button">ログインする</a>
    </div>
</div>
@endsection
