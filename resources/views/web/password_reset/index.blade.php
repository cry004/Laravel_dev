@extends('web.global-web')

@section('page')
<h2>パスワード再発行</h2>
@if ( count($errors) > 0 )
<div class="H-Notice Error">
@foreach ( $errors->all() as $error )
<p class="H-Message">{{ $error }}</p>
@endforeach
</div>
@endif
{!! Form::open(["url" => AppUrl::to("web/password_reset/confirm"), "method" => "POST"]) !!}
{!! Form::hidden("code", $activation->activation_code) !!}
<p class="H-Caption">パスワードの再発行を行います。新しいパスワードを入力して下さい。</p>
<div class="H-Form-Group">
    <label class="H-Form-Label">新しいパスワード（8文字以上）</label>
    {!! Form::password("password", ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Form-Group">
    <label class="H-Form-Label">新しいパスワード（確認）</label>
    {!! Form::password("password_confirmation", ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Action-Group">
    {!! Form::submit("確認", ["class" => "H-Button"]) !!}
</div>
{!! Form::close() !!}
@endsection
