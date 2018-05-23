@extends('web.global-web')

@section('page')
<h2>メールアドレス連携</h2>
@if ( count($errors) > 0 )
<div class="H-Notice Error">
@foreach ( $errors->all() as $error )
<p class="H-Message">{{ $error }}</p>
@endforeach
</div>
@endif
{!! Form::open(["url" => secure_url("web/register/associate"), "method" => "POST"]) !!}
{!! Form::hidden("userId", $user->id) !!}
<p class="H-Caption">メールアドレスの連携を致します。下記の項目を入力して送信してください。</p>
<div class="H-Form-Group">
    <label class="H-Form-Label">メールアドレス</label>
    {!! Form::text("email", old('email'), ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Form-Group">
    <label class="H-Form-Label">パスワード（8文字以上）</label>
    {!! Form::password("password", ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Form-Group">
    <label class="H-Form-Label">パスワード（確認）</label>
    {!! Form::password("password_confirmation", ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Action-Group">
    {!! Form::submit("送信", ["class" => "H-Button"]) !!}
</div>
{!! Form::close() !!}
@endsection
