@extends('web.global-web')

@section('page')
<h2>パスワード再発行</h2>
@if ( count($errors) > 0 )
<div class="H-Notice Error">
@foreach ( $errors->all() as $error )
<p class="H-Message">{{ $error }}</p>
@endforeach
</div>
@elseif ( $resetError )
<div class="H-Notice Error">
<p class="H-Message">{{ $resetError }}</p>
</div>
@endif
{!! Form::open(["url" => AppUrl::to("web/password/reset"), "method" => "POST"]) !!}
<p class="H-Caption">パスワードの再発行をします。登録時のメールアドレスと生年月日を入力してください。</p>
<div class="H-Form-Group">
    <label class="H-Form-Label">メールアドレス</label>
    {!! Form::text("email", old("email"), ["class" => "H-Form-Input"]) !!}
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
