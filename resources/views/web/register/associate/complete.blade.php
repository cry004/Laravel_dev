@extends('web.global-web')

@section('page')
<h2>登録完了</h2>
<p class="H-Caption">登録が完了しました。アプリを起動して始めましょう！</p>

<p class="H-Caption">※メールアドレスの確認メールを送信しました。メールに記載されたURLから認証をおこなってください。<br>
認証の有効期限は2週間です。</p>

<div class="H-Section">
    <div class="H-Action-Group">
        <a href="{{ $app }}" class="H-Button">ログインする</a>
    </div>
</div>
@endsection
