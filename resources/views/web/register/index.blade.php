@extends('web.global-web')

@section('page')
<h2>新規登録</h2>
@if ( count($errors) > 0 )
<div class="H-Notice Error">
@foreach ( $errors->all() as $error )
<p class="H-Message">{{ $error }}</p>
@endforeach
</div>
@endif
{!! Form::open(["url" => AppUrl::to("web/register/confirm"), "method" => "POST"]) !!}
<p class="H-Caption">アカウントの登録を致します。下記の項目を入力して送信してください。</p>
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
<div class="H-Form-Group">
    <label class="H-Form-Label">生年月日</label>
    {!! Form::select("year", $year, ( old("year") ) ? old("year") : 1990, ["class" => "H-Form-Dropdown"]) !!}年
    {!! Form::select("month", $month, ( old("month") ) ? old("month") : 6, ["class" => "H-Form-Dropdown"]) !!}月
    {!! Form::select("day", $day, ( old("day") ) ? old("day") : 15, ["class" => "H-Form-Dropdown"]) !!}日
</div>
<div class="H-Action-Group">
    {!! Form::submit("送信", ["class" => "H-Button"]) !!}
</div>
{!! Form::close() !!}
@endsection
